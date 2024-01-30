<?php
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

namespace PaymentPayloads;

use Handlers\PaymentHandler;

class Paypal extends PaymentHandler {

	/**
	 * Get the payload for the payment request
	 *
	 * @return array
	 */
	public function getPayload(): array {
		return parent::getPayload();
	}
}
