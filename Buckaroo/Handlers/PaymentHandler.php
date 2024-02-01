<?php
/**
 * Buckaroo Payment Gateway for WooCommerce
 *
 * @package BuckarooPaymentGatewayForWooCommerce
 */

namespace Buckaroo\Handlers;

use Buckaroo\Handlers\Reply\ReplyHandler;
use Buckaroo\PaymentMethods\Bancontact\Bancontact;
use Buckaroo\PaymentMethods\Giropay\Giropay;
use Buckaroo\PaymentMethods\iDeal\iDeal;
use Buckaroo\PaymentMethods\KBC\KBC;
use Buckaroo\PaymentMethods\Sofort\Sofort;
use Buckaroo\PaymentMethods\PayPal\PayPal;
use Buckaroo\PaymentMethods\Subscriptions\Subscriptions;
use Buckaroo\PaymentMethods\PaymentMethod;
use Buckaroo\Transaction\Response\TransactionResponse;
use Buckaroo_Logger;
use Client\Client;
use Exception;
use PaymentPayloads\PayPal as PayPalPayload;
use PaymentPayloads\Kbc as KbcPayload;
use PaymentPayloads\Giropay as GiropayPayload;
use PaymentPayloads\iDeal as iDealPayload;
use PaymentPayloads\Bancontact as BancontactPayload;
use PaymentPayloads\Sofort as SofortPayload;
use PaymentPayloads\Subscriptions as SubscriptionsPayload;
use WC_Order;
use WC_Subscriptions_Manager;

class PaymentHandler implements PaymentHandlerInterface {

	protected $payment;
	public const DEFAULT_ACTION = 'pay';
	protected string $action    = self::DEFAULT_ACTION;
	protected array $payload    = array();

	public function __construct( $payment ) {
		$this->payment = $payment;
	}

	/**
	 * @throws Exception
	 */
	public static function get( PaymentMethod $paymentMethod, $payment ) {

		switch ( get_class( $paymentMethod ) ) {
			case iDeal::class:
				return new iDealPayload( $payment );
			case Bancontact::class:
				return new BancontactPayload( $payment );
			case PayPal::class:
				return new PayPalPayload( $payment );
			case KBC::class:
				return new KbcPayload( $payment );
			case Giropay::class:
				return new GiropayPayload( $payment );
			case Sofort::class:
				return new SofortPayload( $payment );
			case Subscriptions::class:
				return new SubscriptionsPayload( $payment );
			default:
				throw new Exception( 'Payment method not found' );
		}
	}

	/**
	 * Get payment payload
	 *
	 * @return array
	 */
	public function getPayload(): array {
		$payload = array(
			'invoice'        => $this->payment->invoiceId,
			'amountDebit'    => $this->payment->amountDedit,
			'returnURL'      => add_query_arg( 'wc-api', 'WC_Gateway_Buckaroo_Subscription', home_url( '/' ) ),
			'startRecurrent' => true,
		);

		$this->payload = array_merge( $this->payload, $payload );

		return $this->payload;
	}

	/**
	 * Get payment method
	 *
	 * @return array
	 */
	public function handleResponse( TransactionResponse $response ) {
		if ( $response->hasRedirect() ) {
			return array(
				'result'   => 'success',
				'redirect' => $response->getRedirectUrl(),
			);
		}

		return array(
			'result'   => 'failure',
			'redirect' => wc_get_checkout_url(),
		);
	}

	public function getAction(): string {
		return $this->action;
	}


	/**
	 * Check response data
	 *
	 * @return void
	 * @throws Exception
	 */
	public static function response_handler() {
		global $woocommerce;

		$order_id = $_POST['brq_invoicenumber'];

		$order = new WC_Order( $order_id );

		try {
			$buckarooClient = new Client();
		} catch ( Exception $e ) {
			Buckaroo_Logger::log( __METHOD__, $e->getMessage() );
			$order->add_order_note(
				sprintf(
					__( 'Buckaroo payment error: %s', 'buckaroo-subscriptions' ),
					$e->getMessage()
				)
			);
			$order->update_status( 'failed' );
			wc_add_notice( __( 'Payment error:', 'buckaroo-subscriptions' ) . $e->getMessage(), 'error' );
			wp_safe_redirect( self::set_failed_url() );
			exit;
		}

		$reply_handler = new ReplyHandler( $buckarooClient->client()->config(), $_POST );
		$reply_handler->validate();
		$statusCode = $reply_handler->data( 'BRQ_STATUSCODE' );
		$gateway    = wc_get_payment_gateway_by_order( $order );

		if ( $reply_handler->isValid() ) {
			if ( $reply_handler->data( 'brq_SERVICE_subscriptions_SubscriptionGuid' ) !== null &&
				is_string( $reply_handler->data( 'brq_SERVICE_subscriptions_SubscriptionGuid' ) )
			) {
				self::insert_subscription( $reply_handler );
				if ( '190' === $statusCode ) {
					$woocommerce->cart->empty_cart();
					$result = array(
						'result'   => 'success',
						'redirect' => $gateway->get_return_url( $order ),
					);

					$order->payment_complete();

					WC_Subscriptions_Manager::activate_subscriptions_for_order( $order );
				} elseif ( '791' === $statusCode ) {
					$woocommerce->cart->empty_cart();
					$result = array(
						'result'   => 'success',
						'redirect' => $gateway->get_return_url( $order ),
					);
				} elseif ( '490' === $statusCode || '690' === $statusCode || '890' === $statusCode ) {
					$order->update_status( 'failed' );
				}
			}

			wp_safe_redirect( isset( $result ) ? $result['redirect'] : self::set_failed_url() );

			exit;
		} else {
			throw new \Exception( 'Payment failed or push body is not valid.' );
		}
	}

	/**
	 * Set failed url
	 *
	 * @return string
	 */
	public static function set_failed_url() {

		$return_url = ( wc_get_checkout_url() ) ? wc_get_checkout_url() : home_url();

		if ( is_ssl() || get_option( 'woocommerce_force_ssl_checkout' ) === 'yes' ) {
			$return_url = str_replace( 'http:', 'https:', $return_url );
		}

		return apply_filters( 'woocommerce_get_return_url', $return_url );
	}

	/**
	 * Insert subscription
	 *
	 * @param ReplyHandler $reply_handler
	 * @return void
	 * @throws Exception
	 */
	public static function insert_subscription( ReplyHandler $reply_handler ) {
		global $wpdb;

		$table_name = $wpdb->prefix . 'buckaroo_subscriptions';

		$data = array(
			'order_id'              => $reply_handler->data( 'brq_ordernumber' ),
			'subscription_guid'     => $reply_handler->data( 'brq_SERVICE_subscriptions_SubscriptionGuid' ),
			'rate_plan_guid'        => $reply_handler->data( 'brq_SERVICE_subscriptions_Subscription_RatePlanChargeGuid' ),
			'rate_plan_charge_guid' => $reply_handler->data( 'brq_SERVICE_subscriptions_Subscription_RatePlanGuid_' ),
			'status'                => $reply_handler->data( 'brq_statuscode' ),
		);

		$wpdb->insert( $table_name, $data );
	}
}
