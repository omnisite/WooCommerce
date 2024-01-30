<?php

namespace Subscriptions;

use WC_Order;
use WC_Subscription;

class SubscriptionData {

	private array $subscription_data;

	/**
	 * SubscriptionData constructor.
	 *
	 * @param WC_Order $order
	 */
	public function __construct( WC_Order $order ) {
		$this->subscription_data = wcs_get_subscriptions_for_order( $order );
	}

	/**
	 * Check if the subscription data is empty
	 *
	 * @return bool
	 */
	public function is_empty(): bool {
		return empty( $this->subscription_data );
	}

	/**
	 * Get subscription data
	 *
	 * @return WC_Subscription
	 */
	public function get_subscription_data(): WC_Subscription {
		return reset( $this->subscription_data );
	}
}
