<?php

/**
 * Make status codes reader friendly 
 *
 * @param  String $status_code
 * @return String 
 */
function fn_buckaroo_resolve_status_code($status_code) {
    require_once(dirname(__FILE__) . '/api/abstract.php');
    switch ($status_code) {

        case BuckarooAbstract::BUCKAROO_SUCCESS:
        {
            return 'completed';
        }
            break;

        case BuckarooAbstract::BUCKAROO_PENDING_PAYMENT:
        {
            return 'on-hold';
        }
            break;
        case BuckarooAbstract::BUCKAROO_CANCELED:
            return 'cancelled';
            break;
        case BuckarooAbstract::BUCKAROO_ERROR:
        case BuckarooAbstract::BUCKAROO_FAILED:
        case BuckarooAbstract::BUCKAROO_INCORRECT_PAYMENT:
        default:
        {
            return 'failed';
        }
    }
}

/**
 * Can the order be refunded.
 *
 * @param  Object $response
 * @param  Object $order WC_Order
 * @param  String $amount
 * @param  String $currency
 * @return String|Boolean 
 */
function fn_buckaroo_process_refund($response, $order, $amount, $currency) {
    if ($response && $response->isValid() && $response->hasSucceeded()) {
        $order->add_order_note(
            sprintf(
                __('Refunded %s - Refund transaction ID: %s', 'wc-buckaroo-bpe-gateway'),
                $amount . ' ' . $currency,
                $response->transactions
            )
        );
        add_post_meta($order->get_order_number(), '_refundbuckaroo' . $response->transactions, 'ok', true);
        update_post_meta($order->get_order_number(), '_pushallowed', 'ok');
        return true;
    }
    if (!empty($response->ChannelError)) {
        $order->add_order_note(
            sprintf(
                __(
                    'Refund failed for transaction ID: %s ' . "\n" . $response->ChannelError,
                    'wc-buckaroo-bpe-gateway'
                ),
                $order->get_transaction_id()
            )
        );
        update_post_meta($order->get_order_number(), '_pushallowed', 'ok');
        return new WP_Error('error_refund', __("Refund failed: ") . $response->ChannelError);
    } else {
        $order->add_order_note(
            sprintf(
                __('Refund failed for transaction ID: %s', 'wc-buckaroo-bpe-gateway'),
                $order->get_transaction_id()
            )
        );
        update_post_meta($order->get_order_number(), '_pushallowed', 'ok');
        return false;
    }
}

function fn_buckaroo_process_response_push($payment_method = null, $response = '') {

    $woocommerce = getWooCommerceObject();
    $wpdb = getWpdbObject();
    require_once(dirname(__FILE__) . '/logger.php');
    require_once(dirname(__FILE__) . '/api/paymentmethods/responsefactory.php');
    if (!session_id()) {
        @ session_start();
    }
    $_SESSION['buckaroo_response'] = '';
    $logger = new BuckarooLogger(BuckarooLogger::INFO, 'return');
    $logger->logInfo("\n\n\n\n***************** Return start ***********************");
    if ($response == '') {
        $response = BuckarooResponseFactory::getResponse();
    };

    $logger->logInfo('Parse response:\n', $response);
    $response->invoicenumber = getOrderIdFromInvoiceId($response->invoicenumber, 'test');
    $order_id = $response->invoicenumber;
    if ((int)$order_id > 0) {
        $order = new WC_Order($order_id);
        if (!isset($GLOBALS['plugin_id'])) {
            $GLOBALS['plugin_id'] = $payment_method->plugin_id . $order->payment_method . "_settings";
        }
    }
    if ($response->isValid()) {
        if ($response->isRedirectRequired()) {
            return array(
                'result' => 'success',
                'redirect' => $response->getRedirectUrl()
            );
        }

        if ($response->brq_relatedtransaction_partialpayment != null) {
            $logger->logInfo('PUSH', "Partial payment PUSH received " . $response->status);
            exit();
        }
        if ($response->brq_relatedtransaction_refund != null) {
            $logger->logInfo('PUSH', "Refund payment PUSH received " . $response->status);
            $allowedPush = get_post_meta($order->get_order_number(), '_pushallowed', true);
            if ($response->hasSucceeded() && $allowedPush == 'ok') {
                $tmp = get_post_meta($order->get_order_number(), '_refundbuckaroo' . $response->transactions, true);
                if (empty($tmp)) {
                    add_post_meta($order->get_order_number(), '_refundbuckaroo' . $response->transactions, 'ok', true);
                    $refund = wc_create_refund(
                        array(
                            'amount' => $response->amount_credit,
                            'reason' => 'Push automatic refund from BPE; Please restock items manually',
                            'order_id' => $order->get_order_number(),
                            'line_items' => Array()
                        )
                    );
                }

            }
            exit();
        }
        $logger->logInfo('Order status: ' . $order->status);
        $response_status = fn_buckaroo_resolve_status_code($response->status);
        $logger->logInfo('Response order status: ' . $response_status);
        $logger->logInfo('Status message: ' . $response->statusmessage);
        if ($response->hasSucceeded()) {
            if (in_array($order->status, array('completed', 'processing'))) {
                $logger->logInfo(
                    'Push message. Order already in final state or have the same status as response. Order status: ' . $order->status
                );
                switch ($response_status) {
                    case 'completed':
                        if (!is_null($payment_method)) {
                            return array(
                                'result' => 'success',
                                'redirect' => $payment_method->get_return_url($order)
                            );
                        }
                        break;
                    default:
                        return;
                }
            } else {
                switch ($response_status) {
                    case 'completed':

                        $transaction = $response->transactions;
                        $payment_methodname = $response->payment_method;
                        if ($response->brq_relatedtransaction_partialpayment != null) {
                            $transaction = $response->brq_relatedtransaction_partialpayment;
                            $payment_methodname = 'grouptransaction';
                        }

                        $row = $wpdb->get_row(
                            "
                                SELECT wc_orderid FROM {$wpdb->prefix}woocommerce_buckaroo_transactions WHERE wc_orderid = " . intval(
                                $order_id
                            ) . "
                                "
                        );
                        if (empty($row->wc_orderid)) {
                            $wpdb->query(
                                $wpdb->prepare(
                                    "
                                INSERT INTO {$wpdb->prefix}woocommerce_buckaroo_transactions VALUES (" . intval(
                                        $order_id
                                    ) . ", %s)",
                                    $transaction
                                )
                            );
                        }
                        $clean_order_no = (int) str_replace('#', '', $order->get_order_number());
                        add_post_meta($clean_order_no, '_payment_method_transaction', $payment_methodname, true);
                        $order->payment_complete($transaction);
                        add_post_meta($order->get_order_number(), '_pushallowed', 'ok', true);
                        break;
                    default:
                        $order->update_status('on-hold', __($response->statusmessage, 'wc-buckaroo-bpe-gateway'));
                        // Reduce stock levels
                        break;
                }
                // Remove cart
                $woocommerce->cart->empty_cart();
                if (isset($response->consumerMessage['HtmlText'])) {
                    $_SESSION['buckaroo_response'] = $response->consumerMessage['HtmlText'];
                }
                // Return thank you page redirect
                if (!is_null($payment_method)) {
                    return array(
                        'result' => 'success',
                        'redirect' => $payment_method->get_return_url($order)
                    );
                }
            }

        } else {
            $logger->logInfo('Payment request failed/canceled. Order status: ' . $order->status);
            if (!in_array(
                $order->status,
                array('completed', 'processing')
            )
            ) //We receive a valid response that the payment is canceled/failed.
            {
                $order->update_status('failed', __($response->statusmessage, 'wc-buckaroo-bpe-gateway'));
            } else {
                $logger->logInfo('Push message. Order status cannot be changed.');
            }
            if ($response_status == 'cancelled') {
                wc_add_notice(__('Payment cancelled by customer.', 'wc-buckaroo-bpe-gateway'), 'error');
            } else {
                if ($response->payment_method == 'afterpaydigiaccept' && $response->statuscode == 690) {
                    wc_add_notice(
                        __(
                            "We are sorry to inform you that the request to pay afterwards with AfterPay is not possible at this time. This can be due to various (temporary) reasons. For questions about your rejection you can contact the customer service of AfterPay. Or you can visit the website of AfterPay and check the 'Frequently asked questions' through this <a href=\"https://www.afterpay.nl/nl/consumenten/vraag-en-antwoord\" target=\"_blank\">link</a>. We advise you to choose another payment method to complete your order.",
                            'wc-buckaroo-bpe-gateway'
                        ),
                        'error'
                    );
                } else {
                     wc_add_notice(
                        __(
                            'Payment unsuccessful. Please try again or choose another payment method.',
                            'wc-buckaroo-bpe-gateway'
                        ),
                        'error'
                    );
                }
            }
            return;
        }
    } else {
        $logger->logInfo('Response not valid!');
        $logger->logInfo('Parse response:\n', $response);
        if ($response->payment_method == 'afterpaydigiaccept' && $response->statuscode == 690) {
            wc_add_notice(
                __(
                    "We are sorry to inform you that the request to pay afterwards with AfterPay is not possible at this time. This can be due to various (temporary) reasons. For questions about your rejection you can contact the customer service of AfterPay. Or you can visit the website of AfterPay and check the 'Frequently asked questions' through this <a href=\"https://www.afterpay.nl/nl/consumenten/vraag-en-antwoord\" target=\"_blank\">link</a>. We advise you to choose another payment method to complete your order.",
                    'wc-buckaroo-bpe-gateway'
                ),
                'error'
            );
        } else {
             wc_add_notice(
                __(
                    'Payment unsuccessful. Please try again or choose another payment method.',
                    'wc-buckaroo-bpe-gateway'
                ),
                'error'
            );
        }
        return;
    }

}

/**
* Process response from buckaroo
* 
* @param object $payment_method defaults to NULL
* @param string $response 
* @param string $mode  
* @return void|array
*/
function fn_buckaroo_process_response($payment_method = null, $response = '', $mode = '') {
    $woocommerce = getWooCommerceObject();
    $wpdb = getWpdbObject();
    require_once(dirname(__FILE__) . '/logger.php');
    require_once(dirname(__FILE__) . '/api/paymentmethods/responsefactory.php');
    if (!session_id()) {
        @ session_start();
    }
    $_SESSION['buckaroo_response'] = '';
    $logger = new BuckarooLogger(BuckarooLogger::INFO, 'return');
    $logger->logInfo("\n\n\n\n***************** Return start ***********************");
    if ($response == '') {
        $response = BuckarooResponseFactory::getResponse();
    };

    $logger->logInfo('Parse response:\n', $response);
    $response->invoicenumber = getOrderIdFromInvoiceId($response->invoicenumber, $mode);
    $order_id = $response->invoicenumber;
    if ((int)$order_id > 0) {
        $order = new WC_Order($order_id);
        if (!isset($GLOBALS['plugin_id'])) {
            $GLOBALS['plugin_id'] = $payment_method->plugin_id . $order->payment_method . "_settings";
        }
    }
    if ($response->isValid()) {
        if ($response->isRedirectRequired()) {
            return array(
                'result' => 'success',
                'redirect' => $response->getRedirectUrl()
            );
        }
        $logger->logInfo('Order status: ' . $order->get_status());
        $response_status = fn_buckaroo_resolve_status_code($response->status);
        $logger->logInfo('Response order status: ' . $response_status);
        $logger->logInfo('Status message: ' . $response->statusmessage);
        if ($response->hasSucceeded()) {
            $logger->logInfo(
                'Order already in final state or  have the same status as response. Order status: ' . $order->get_status()
            );

            if ($response->payment_method == 'SepaDirectDebit') {
                /* @var $response Response */
                foreach ($response->getResponse()->Services->Service->ResponseParameter as $param) {
                    if ($param->Name == 'MandateReference') {
                        $order->add_order_note('MandateReference: ' . $param->_, 1);
                    }
                    if ($param->Name == 'MandateDate') {
                        $order->add_order_note('MandateDate: ' . $param->_, 1);
                    }
                }
            }
            switch ($response_status) {
                case 'completed':
                case 'processing':
                case 'pending':
                case 'on-hold':
                    if (!is_null($payment_method)) {
                        $woocommerce->cart->empty_cart();
                        return array(
                            'result' => 'success',
                            'redirect' => $payment_method->get_return_url($order)
                        );
                    }
                    break;
                default:
                    return;
            }
        } else {
            $logger->logInfo('Payment request failed/canceled. Order status: ' . $order->get_status());
            if (!in_array($order->get_status(), array('completed', 'processing', 'cancelled', 'failed', 'refund'))) {
                //We receive a valid response that the payment is canceled/failed.
                $order->update_status('failed', __($response->statusmessage, 'wc-buckaroo-bpe-gateway'));
            } else {
                $logger->logInfo('Order status cannot be changed.');
            }
            if ($response_status == 'cancelled') {
                $order->update_status('cancelled', __($response->statusmessage, 'wc-buckaroo-bpe-gateway'));
                wc_add_notice(__('Payment cancelled by customer.', 'wc-buckaroo-bpe-gateway'), 'error');
            } else {
                $order->update_status('failed', __($response->statusmessage, 'wc-buckaroo-bpe-gateway'));
                if ($response->payment_method == 'afterpaydigiaccept' && $response->statuscode == 690) {
                    wc_add_notice(
                        __(
                            "We are sorry to inform you that the request to pay afterwards with AfterPay is not possible at this time. This can be due to various (temporary) reasons. For questions about your rejection you can contact the customer service of AfterPay. Or you can visit the website of AfterPay and check the 'Frequently asked questions' through this <a href=\"https://www.afterpay.nl/nl/consumenten/vraag-en-antwoord\" target=\"_blank\">link</a>. We advise you to choose another payment method to complete your order.",
                            'wc-buckaroo-bpe-gateway'
                        ),
                        'error'
                    );
                } else {
                     wc_add_notice(
                        __(
                            'Payment unsuccessful. Please try again or choose another payment method.',
                            'wc-buckaroo-bpe-gateway'
                        ),
                        'error'
                    );
                    if (WooV3Plus()) {
                        if($order->get_billing_country()=='NL') {
                            $error_description = str_replace(':', '', substr($response->ChannelError , strrpos($response->ChannelError, ': ')));
                            wc_add_notice(__($error_description, 'wc-buckaroo-bpe-gateway'), 'error');
                        }
                    } else {
                        if($order->billing_country=='NL') {
                            $error_description = str_replace(':', '', substr($response->ChannelError , strrpos($response->ChannelError, ': ')));
                            wc_add_notice(__($error_description, 'wc-buckaroo-bpe-gateway'), 'error');
                        }
                    }
                }
            }
            return;
        }
    } else {
        $logger->logForUser(
            'Response not valid for order. Signature calculation failed. Order id: ' . (!empty($order_id) ? $order_id : 'order not created')
        );
        $logger->logInfo('Response not valid!');
        $logger->logInfo('Parse response:\n', $response);

        return;
    }

}

/**
 * Split address to parts
 *
 * @param string $address
 * @return array
 */
function fn_buckaroo_get_address_components($address) {

    $result = array();
    $result['house_number'] = '';
    $result['number_addition'] = '';

    $address = str_replace(array('?', '*', '[', ']', ',', '!'), ' ', $address);
    $address = preg_replace('/\s\s+/', ' ', $address);

    preg_match('/^([0-9]*)(.*?)([0-9]+)(.*)/', $address, $matches);

    if (!empty($matches[2])) {
        $result['street'] = trim($matches[1] . $matches[2]);
        $result['house_number'] = trim($matches[3]);
        $result['number_addition'] = trim($matches[4]);
    } else {
        $result['street'] = $address;
    }

    return $result;
}

/**
 * Cancel order and create new if order_awaiting_payment exists
 */
function resetOrder() {
    $order_id = WC()->session->order_awaiting_payment;
    if($order_id) {
        $order = wc_get_order( $order_id );

        // $status = $order->post_status; 
        $status = get_post_status($order_id);

        if(($status == 'wc-failed' || $status == 'wc-cancelled') && wc_notice_count( 'error' ) == 0) {
            //Add generated hash to order for WooCommerce versions later than 2.5
            if (isset(WC()->version) && !empty(WC()->version) && ((substr(WC()->version, 0, 1) === '2' && substr(WC()->version, 2, 1) > 5) || substr(WC()->version, 0, 1) === '3') ) {
                $order->cart_hash = md5(json_encode(wc_clean(WC()->cart->get_cart_for_session())) . WC()->cart->total);
            } elseif (substr(WC()->version, 0, 1) > 3) {
                wc_doing_it_wrong("resetOrder", "WC Version not supported", "4+");
            }

            $newOrder = wc_create_order($order);
//            $order->update_status('cancelled', __($response->statusmessage, 'wc-buckaroo-bpe-gateway'));
            WC()->session->order_awaiting_payment = $newOrder->get_order_number();
        }
    }
}

/**
 * Generates uniq invocie ID
 *
 * @param string $orderID
 * @param string $mode
 * @return string
 */
function getUniqInvoiceId($order_id, $mode = 'live') {
    $paymentMethod = $_REQUEST['payment_method'];
    $time = time();
    if(!empty($paymentMethod) && $paymentMethod == 'buckaroo_afterpay') {
        $time = substr($time, -5);
    }
    $postfix = ''; //_i'.$time;
    $invoiceId = (string)$order_id.$postfix;
    if ($mode == 'test') {
        $invoiceId = 'WP_'.(string)$order_id.$postfix;
    }

    return $invoiceId;
}

/**
 * Return Order ID from previously genereated Invoice ID
 *
 * @param string $orderID
 * @param string $mode
 * @return string
 */
function getOrderIdFromInvoiceId($invoice_id, $mode = 'live') {
    if ($mode == 'test') {
        $invoice_id = str_replace("WP_", "", $invoice_id);
    }
    $order_id = preg_replace('/_i(.*)/','',$invoice_id);
    return $order_id;
}

//[9Yards][JW][2017-04-07] - New Functions added by 9Yards start here

/**
 * Checks if WooCommerce Version 3 or greater is installed
 *
 * @return boolean
 */
function WooV3Plus() {
    if (substr(WC()->version, 0, 1) >= 3 ) {
        return true;
    } else {
        return false; 
    }
}

/**
 * Replaces multiple calls throughout plugin to "global $woocommerce"
 *
 * @return object
 */   
function getWooCommerceObject() {
    global $woocommerce;
    return $woocommerce;
}

/**
 * Replaces multiple calls throughout plugin to "global $wpdb"
 *
 * @return object
 */   
function getWpdbObject() {
    global $wpdb;
    return $wpdb;
}

/**
 * Write a message to the buckaroo debug log
 *
 * @param string $message, string $file, int $line
 * @return void
 */
function writeToDebug($request, $type){
    if (BuckarooConfig::get('BUCKAROO_DEBUG') == 'on') {
        if (!file_exists(dirname(__FILE__)."/../traffic-debug/")) {
            mkdir(dirname(__FILE__)."/../traffic-debug/", 0777);
        }
        $file = dirname(__FILE__)."/../traffic-debug/".time()."-$type.log";
        $request->save($file);

        //Begin - Reduce sensitivity
        $content = file_get_contents($file);

        $sensative_content[] = BuckarooConfig::get('BUCKAROO_MERCHANT_KEY');
        $sensative_content[] = BuckarooConfig::get('BUCKAROO_SECRET_KEY');
        $sensative_content[] = BuckarooConfig::get('BUCKAROO_CERTIFICATE_THUMBPRINT');
        foreach ($sensative_content as $s) {
            $content = str_replace($s, "************", $content);
        }
        file_put_contents($file, $content);
        //End - Reduce sensitivity
    }
    return;
}

/**
 * Write a message to the buckaroo debug log
 *
 * @param string $message, string $file, int $line
 * @return void
 */
function writeToTestscriptsLog($method, $type, $event, $json){
    $time = date('Y-m-d@H:i:s', time());
    $log = fopen('/var/log/buckaroo/testscripts.log', "a") or die("Unable to open testscripts.log!");
    $wcv = WC()->version;
    $wpv = get_bloginfo('version');
    if($json != 'no json'){
        fwrite($log, "$time, WC: $wcv, WP: $wpv - $event from $type - $method: $json"."\n");
    } else {
        fwrite($log, "$time, WC: $wcv, WP: $wpv - $event of type $type - $method"."\n");
    }
    fclose($log);
    return;
}

function getWCOrderDetails($order_id, $field) {
    $order = (WooV3Plus()) ? wc_get_order($order_id) : new WC_Order($order_id);
    $shipping_arr = array(
        'shipping_phone', 
        'shipping_email', 
        'shipping_country', 
        'shipping_city', 
        'shipping_postcode', 
        'shipping_address_1', 
        'shipping_address_2', 
        'shipping_first_name', 
        'shipping_last_name'
    );
    if (in_array($field, $shipping_arr)) {
        $pickAddress = pickAddress($order);
        $offset = str_replace('shipping_', '', $field);
        return $pickAddress[$offset];
    } elseif(WooV3Plus()) {
       return $order->{"get_".$field}(); 
    } else {
       return $order->{$field};
    }
}

function getWCOrder($order_id) {
    if(WooV3Plus()){
       $order = wc_get_order($order_id);
       return $order; 
    } else {
       $order = new WC_Order($order_id);
       return $order;
    }
}

/**
 * Checks if there is a shipping address & Returns
 *
 * @param object $order
 * @return array $result
 */
function pickAddress($order) {
    //There is no shipping phone
    $get_billing_phone = (WooV3Plus()) ? $order->get_billing_phone() : $order->billing_phone;
    $result['phone'] = (!empty($get_billing_phone)) ? $get_billing_phone : '';

    //There is no shipping email
    $get_billing_email = (WooV3Plus()) ? $order->get_billing_email() : $order->billing_email;
    $result['email'] = (!empty($get_billing_email)) ? $get_billing_email : '';

    $get_shipping_country = (WooV3Plus()) ? $order->get_shipping_country() : $order->shipping_country;
    $get_billing_country = (WooV3Plus()) ? $order->get_billing_country() : $order->billing_country;
    $country = (!empty($get_shipping_country)) ? $get_shipping_country : $get_billing_country;
    $result['country'] = (!empty($country) && $country != '') ? $country : '';

    $get_shipping_city = (WooV3Plus()) ? $order->get_shipping_city() : $order->shipping_city;
    $get_billing_city = (WooV3Plus()) ? $order->get_billing_city() : $order->billing_city;
    $city = (!empty($get_shipping_city)) ? $get_shipping_city : $get_billing_city;
    $result['city'] = (!empty($city) && $city != '') ? $city : '';

    $get_shipping_postcode = (WooV3Plus()) ? $order->get_shipping_postcode(): $order->shipping_postcode;
    $get_billing_postcode = (WooV3Plus()) ? $order->get_billing_postcode(): $order->billing_postcode;
    $postcode = (!empty($get_shipping_postcode)) ? $get_shipping_postcode : $get_billing_postcode;
    $result['postcode'] = (!empty($postcode) && $postcode != '') ? $postcode : '';

    $get_shipping_address_1 = (WooV3Plus()) ? $order->get_shipping_address_1(): $order->shipping_address_1;
    $get_billing_address_1 = (WooV3Plus()) ? $order->get_billing_address_1(): $order->billing_address_1;
    $address_1 = (!empty($get_shipping_address_1)) ? $get_shipping_address_1 : $get_billing_address_1;
    $result['address_1'] = (!empty($address_1) && $address_1 != '') ? $address_1 : '';

    $get_shipping_address_2 = (WooV3Plus()) ? $order->get_shipping_address_2(): $order->shipping_address_2;
    $get_billing_address_2 = (WooV3Plus()) ? $order->get_billing_address_2(): $order->billing_address_2;
    $address_2 = (!empty($get_shipping_address_2)) ? $get_shipping_address_2 : $get_billing_address_2;
    $result['address_2'] = (!empty($address_2) && $address_2 != '') ? $address_2 : '';

    $get_shipping_first_name = (WooV3Plus()) ? $order->get_shipping_first_name(): $order->shipping_first_name;
    $get_billing_first_name = (WooV3Plus()) ? $order->get_billing_first_name(): $order->billing_first_name;
    $first_name = (!empty($get_shipping_first_name)) ? $get_shipping_first_name : $get_billing_first_name;
    $result['first_name'] = (!empty($first_name) && $first_name != '') ? $first_name : '';

    $get_shipping_last_name = (WooV3Plus()) ? $order->get_shipping_last_name(): $order->shipping_last_name;
    $get_billing_last_name = (WooV3Plus()) ? $order->get_billing_last_name(): $order->billing_last_name;
    $last_name = (!empty($get_shipping_last_name)) ? $get_shipping_last_name : $get_billing_last_name;
    $result['last_name'] = (!empty($last_name) && $last_name != '') ? $last_name : '';

    return $result;
} 