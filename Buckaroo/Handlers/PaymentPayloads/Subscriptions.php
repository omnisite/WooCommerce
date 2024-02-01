<?php

namespace Buckaroo\Handlers\PaymentPayloads;

use Handlers\PaymentHandler;
use Exception;
use Models\Address;
use Models\Person;
use Models\RatePlan;
use Models\RatePlanCharge;
use Models\Subscription;
use WC_Tax;

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

class Subscriptions extends PaymentHandler {

    /**
     * Get the payload for the payment request
     *
     * @return array
     * @throws Exception
     */
	public function getPayload(): array {
		$product_info    = $this->extract_product_info();
		$billing_address = $this->payment->get_address( 'billing' );

		$subscriptionConfigurationCode = $this->getMasterSettingsData( 'subscriptionConfigurationCode' );

		$addRatePlanCharge = $this->create_rate_plan_charge( $product_info );
		$addRatePlan       = $this->create_rate_plan( $product_info );

		$person = new Person();
		$person->setFirstName( $billing_address['first_name'] );
		$person->setLastName( $billing_address['last_name'] );
		$person->setCulture( 'nl-NL' );

		$address = new Address();
		$address->setStreet( $billing_address['address_1'] );
		$address->setCity( $billing_address['city'] );
		$address->setZipCode( $billing_address['postcode'] );
		$address->setCountry( $billing_address['country'] );

		$subscription = new Subscription();
		$subscription->setIncludeTransaction( true );
		$subscription->setTransactionVatPercentage( $product_info['tax_percentage'] );
		$subscription->setConfigurationCode( $subscriptionConfigurationCode );
		$subscription->setEmail( $billing_address['email'] );
		$subscription->setRatePlans( 'add', $addRatePlan->get_object_as_array() );
		$subscription->setRatePlanCharges( 'add', $addRatePlanCharge->get_object_as_array() );
		$subscription->setPerson( $person->get_object_as_array() );
		$subscription->setAddress( $address->get_object_as_array() );
		$subscription->setDebtor( $this->payment->get_customer_id() );

		return array_filter(
			$subscription->get_object_as_array(),
			function ( $value ) {
				return null !== $value;
			}
		);
	}

	/**
	 * @param $key
	 *
	 * @return mixed
	 * @throws Exception
	 */
	public function getMasterSettingsData( $key ) {
		$master_settings = get_option( 'woocommerce_buckaroo_mastersettings_settings', null );

		if ( $master_settings ) {
			return $master_settings[ $key ] ?? '';
		} else {
			throw new Exception( 'Buckaroo master settings not found.' );
		}
	}

	public function extract_product_info(): array {

		$subscription_products = $this->payment->get_items();

		if ( empty( $subscription_products ) ) {
			return array();
		}

		$product    = reset( $subscription_products ); // Get the first product
		$quantity   = $product->get_quantity();
		$itemprice  = $product->get_total() / $quantity;
		$product_id = $product->get_product_id();
		$product    = wc_get_product( $product_id );
		$tax_class  = $product->get_tax_class();
		$tax_rates  = WC_Tax::get_rates( $tax_class );

		$tax_percentage = $this->calculate_tax_percentage( $tax_rates );

		return array(
			'quantity'            => $quantity,
			'item_price'          => $itemprice,
			'product_id'          => $product_id,
			'product_title'       => $product->get_name() ?: 'no title',
			'product_description' => $product->get_description() ?: 'no description',
			'tax_percentage'      => $tax_percentage,
			'price_includes_tax'  => get_option( 'woocommerce_prices_include_tax' ),
		);
	}

	private function calculate_tax_percentage( array $tax_rates ): float {
		$tax_percentage = 0;

		if ( ! empty( $tax_rates ) ) {
			foreach ( $tax_rates as $rate ) {
				$tax_percentage += (float) $rate['rate'];
			}
		}

		return $tax_percentage;
	}

	public function create_rate_plan_charge( $product_info ): RatePlanCharge {
		$addRatePlanCharge = new RatePlanCharge();
		$addRatePlanCharge->setRatePlanChargeName( $product_info['product_title'] );
		$addRatePlanCharge->setRateplanChargeProductId( $product_info['product_id'] );
		$addRatePlanCharge->setRateplanChargeDescription( $product_info['product_description'] );
		$addRatePlanCharge->setUnitOfMeasure( 'Quantity' );
		$addRatePlanCharge->setRatePlanChargeType( 'Recurring' );
		$addRatePlanCharge->setBaseNumberOfUnits( $product_info['quantity'] );
		$addRatePlanCharge->setPartialBilling( 'Billfull' );
		$addRatePlanCharge->setPricePerUnit( $product_info['item_price'] );
		$addRatePlanCharge->setPriceIncludesVat( $product_info['price_includes_tax'] );
		if ( 'incl' !== $product_info['price_includes_tax'] ) {
			$addRatePlanCharge->setVatPercentage( $product_info['tax_percentage'] );
		}

		return $addRatePlanCharge;
	}

	public function create_rate_plan( $product_info ): RatePlan {
		$addRatePlan = new RatePlan();
		$addRatePlan->setStartDate( $this->payment->get_date( 'start' ) );
		if ( $this->payment->get_date( 'end' ) ) {
			$addRatePlan->setEndDate( $this->payment->get_date( 'end' ) );
		}
		$addRatePlan->setRatePlanName( $product_info['product_title'] );
		$addRatePlan->setRatePlanDescription( $product_info['product_description'] );
		$addRatePlan->setCurrency( $this->payment->get_currency() );
		$addRatePlan->setBillingTiming( 1 );
		$addRatePlan->setAutomaticTerm( true );
		$addRatePlan->setBillingInterval( $this->payment->get_billing_period() );

		if ( 0 !== $this->payment->get_date( 'trial_end' ) ) {
			$target_date = date_create( $this->payment->get_date( 'trial_end' ), wp_timezone() );
			$today       = date_create( current_time( 'mysql' ), wp_timezone() );
			$interval    = date_diff( $today, $target_date );
			$days        = $interval->days;
		}

		$addRatePlan->setTrialPeriodDays( $days ?? 0 );
		$addRatePlan->setInheritPaymentMethod( true );

		if ( 'day' === $this->payment->get_billing_period() ) {
			$addRatePlan->setCustomNumberOfDays( $this->payment->get_billing_interval() );
		}

		return $addRatePlan;
	}
}
