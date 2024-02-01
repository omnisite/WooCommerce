<?php

namespace Buckaroo\Subscriptions;

use Buckaroo_Logger;
use BuckarooPaymentMethod;
use Buckaroo\Client\Client;
use Exception;
use Buckaroo\Handlers\PaymentHandler;
use Buckaroo\Transaction\Response\TransactionResponse;
use WC_Order;

/**
 * Plugin Name:       Buckaroo WooCommerce Subscriptions
 * Plugin URI:        https://www.buckaroo.nl
 * Description:       Buckaroo WooCommerce Subscription Plugin.
 * Version:           1.0.0
 * Author:            Buckaroo
 * Author URI:        https://www.buckaroo.nl
 * Text Domain:       buckaroo-subscriptions
 * Domain Path:       /languages
 *
 * @package Buckaroo
 */

/**
 * Class Subscriptions
 *
 * @package Subscriptions
 */
class Subscriptions {

	/**
	 * Buckaroo client
	 *
	 * @var Client
	 */
	private Client $client;

	/**
	 * WooCommerce order
	 *
	 * @var WC_Order
	 */
	private WC_Order $order;

	/**
	 * Buckaroo payment method
	 *
	 * @var BuckarooPaymentMethod
	 */
	private BuckarooPaymentMethod $payment_method;

	/**
	 * Subscription data handler
	 *
	 * @var SubscriptionData
	 */
	private SubscriptionData $subscription_data;

	/**
	 * Subscriptions constructor.
	 *
	 * @param WC_Order $order Order.
	 * @param BuckarooPaymentMethod $payment_method Payment method.*
	 * @throws Exception
	 */
	public function __construct( WC_Order $order, BuckarooPaymentMethod $payment_method ) {
		$this->order             = $order;
		$this->payment_method    = $payment_method;
		$this->client            = new Client( $payment_method );
		$this->subscription_data = new SubscriptionData( $order );
	}

	/**
	 * Create combined subscriptions
	 *
	 * @return TransactionResponse|null|array
	 */
	public function create_combined_subscriptions() {
		$subscription_response = null;

		if ( ! $this->subscription_data->is_empty() ) {
			$subscription = $this->subscription_data->get_subscription_data();
			// If there are subscriptions associated with the order, process them
			$buckaroo_subscriptions = $this->client->method( 'subscriptions' );

			try {
				$handler_response = PaymentHandler::get( $buckaroo_subscriptions->paymentMethod(), $subscription );
			} catch ( Exception $e ) {
				Buckaroo_Logger::log( __METHOD__, $e->getMessage() );
				$this->order->add_order_note(
					sprintf(
						__( 'Buckaroo payment error: %s', 'buckaroo-subscriptions' ),
						$e->getMessage()
					)
				);
				$this->order->update_status( 'failed' );
				wc_add_notice( __( 'Payment error:', 'buckaroo-subscriptions' ) . $e->getMessage(), 'error' );
				return array(
					'result'   => 'failure',
					'redirect' => '',
				);
			}
			$subscription_response = $buckaroo_subscriptions->manually()->createCombined( $handler_response->getPayload() );
		}
		return $subscription_response;
	}

	/**
	 * Process payment
	 *
	 * @return array
	 */
	public function process_payment(): array {

		$subscription_response = $this->create_combined_subscriptions();
		$buckaroo_method       = $this->client->method( $this->payment_method->getType() );

		try {
			$handler_response = PaymentHandler::get( $buckaroo_method->paymentMethod(), $this->payment_method );
		} catch ( Exception $e ) {
			Buckaroo_Logger::log( __METHOD__, $e->getMessage() );
			$this->order->add_order_note(
				sprintf(
					__( 'Buckaroo payment error: %s', 'buckaroo-subscriptions' ),
					$e->getMessage()
				)
			);
			$this->order->update_status( 'failed' );
			wc_add_notice( __( 'Payment error:', 'buckaroo-subscriptions' ) . $e->getMessage(), 'error' );
			return array(
				'result'   => 'failure',
				'redirect' => '',
			);
		}
		$action   = $handler_response->getAction();
		$response = $buckaroo_method->combine( $subscription_response )->$action( $handler_response->getPayload() );

		return $handler_response->handleResponse( $response );
	}
}
