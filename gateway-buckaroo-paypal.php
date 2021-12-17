<?php

require_once dirname(__FILE__) . '/library/api/paymentmethods/buckaroopaypal/buckaroopaypal.php';

/**
 * @package Buckaroo
 */
class WC_Gateway_Buckaroo_Paypal extends WC_Gateway_Buckaroo
{
    const PAYMENT_CLASS = BuckarooPayPal::class;
    public function __construct()
    {
        $this->id                     = 'buckaroo_paypal';
        $this->title                  = 'Buckaroo PayPal';
        $this->has_fields             = false;
        $this->method_title           = "Buckaroo PayPal";
        $this->setIcon('24x24/paypal.gif', 'new/PayPal.png');

        parent::__construct();
        $this->addRefundSupport();
    }

    /**
     * Can the order be refunded
     * @param integer $order_id
     * @param integer $amount defaults to null
     * @param string $reason
     * @return callable|string function or error
     */
    public function process_refund($order_id, $amount = null, $reason = '')
    {
        $order = wc_get_order($order_id);
        if (!$this->can_refund_order($order)) {
            return new WP_Error('error_refund_trid', __("Refund failed: Order not in ready state, Buckaroo transaction ID do not exists."));
        }
        update_post_meta($order_id, '_pushallowed', 'busy');
        $GLOBALS['plugin_id'] = $this->plugin_id . $this->id . '_settings';
        $order                = wc_get_order($order_id);

        $paypal                         = new BuckarooPayPal();
        $paypal->amountDedit            = 0;
        $paypal->amountCredit           = $amount;
        $paypal->currency               = $this->currency;
        $paypal->description            = $reason;
        $paypal->orderId                = $order_id; // $order->get_order_number();
        $paypal->OriginalTransactionKey = $order->get_transaction_id();
        $paypal->returnUrl              = $this->notify_url;
        $paypal->invoiceId              = $order->get_order_number();
        $payment_type                   = str_replace('buckaroo_', '', strtolower($this->id));
        $paypal->channel                = BuckarooConfig::getChannel($payment_type, __FUNCTION__);
        $response                       = null;

        $orderDataForChecking = $paypal->getOrderRefundData();

        try {
            $paypal->checkRefundData($orderDataForChecking);
            $response = $paypal->Refund();
        } catch (exception $e) {
            update_post_meta($order_id, '_pushallowed', 'ok');
            return new WP_Error('refund_error', __($e->getMessage()));
        }
        return fn_buckaroo_process_refund($response, $order, $amount, $this->currency);
    }

    /**
     * Process payment
     *
     * @param integer $order_id
     * @return callable fn_buckaroo_process_response()
     */
    public function process_payment($order_id)
    {
        $order = getWCOrder($order_id);
        /** @var BuckarooPayPal */
        $paypal = $this->createDebitRequest($order);

        $customVars                     = array();
        $customVars['CustomerLastName'] = getWCOrderDetails($order_id, 'billing_last_name');

      
        if ($this->sellerprotection == 'TRUE') {
            $paypal->sellerprotection         = 1;
            $get_shipping_postcode            = getWCOrderDetails($order_id, 'shipping_postcode');
            $customVars['ShippingPostalCode'] = !empty($get_shipping_postcode) ? $get_shipping_postcode : '';

            $get_shipping_city          = getWCOrderDetails($order_id, 'shipping_city');
            $customVars['ShippingCity'] = !empty($get_shipping_city) ? $get_shipping_city : '';

            $get_billing_address_1        = getWCOrderDetails($order_id, 'billing_address_1');
            $get_billing_address_2        = getWCOrderDetails($order_id, 'billing_address_2');
            $address_components           = fn_buckaroo_get_address_components($get_billing_address_1 . " " . $get_billing_address_2);
            $customVars['ShippingStreet'] = !empty($address_components['street']) ? $address_components['street'] : '';
            $customVars['ShippingHouse']  = !empty($address_components['house_number']) ? $address_components['house_number'] : '';

            $customVars['StateOrProvince'] = getWCOrderDetails($order_id, 'billing_state');
            $customVars['Country']         = getWCOrderDetails($order_id, 'billing_country');

        }
        $response = $paypal->Pay($customVars);

        return fn_buckaroo_process_response($this, $response);
    }
    /**
     * Add fields to the form_fields() array, specific to this page.
     *
     * @access public
     */
    public function init_form_fields()
    {
        parent::init_form_fields();

        $this->form_fields['sellerprotection'] = array(
            'title'       => __('Seller Protection', 'wc-buckaroo-bpe-gateway'),
            'type'        => 'select',
            'description' => __('Sends customer address information to PayPal to enable PayPal seller protection.', 'wc-buckaroo-bpe-gateway'),
            'options'     => array('TRUE' => __('Enabled', 'wc-buckaroo-bpe-gateway'), 'FALSE' => __('Disabled', 'wc-buckaroo-bpe-gateway')),
            'default'     => 'TRUE');
    }
}
