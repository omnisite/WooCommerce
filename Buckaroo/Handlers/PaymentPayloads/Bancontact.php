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

class Bancontact extends PaymentHandler {

	/**
	 * Get the payload for the payment request
	 *
	 * @return array
	 */
	public function getPayload(): array {
		$this->payload = array_merge(
			$this->payload,
			array(
				'order' => $this->payment->orderId,
			)
		);

		return parent::getPayload();
	}
}
