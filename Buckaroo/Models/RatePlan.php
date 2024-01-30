<?php

namespace Models;

use Buckaroo\PaymentMethods\Subscriptions\Models\RatePlan as RatePlanBuckaroo;

/**
 * @package Buckaroo
 */
class RatePlan extends RatePlanBuckaroo {
	/**
	 * @param string $startDate
	 */
	public function setStartDate( string $startDate ): void {
		$this->startDate = gmdate( 'Y-m-d', strtotime( $startDate ) );
	}

	/**
	 * @param string $endDate
	 */
	public function setEndDate( string $endDate ): void {
		$this->endDate = gmdate( 'Y-m-d', strtotime( $endDate ) );
	}

	/**
	 * @param mixed $ratePlanName
	 */
	public function setRatePlanName( $ratePlanName ): void {
		$this->ratePlanName = $ratePlanName;
	}

	/**
	 * @param mixed $ratePlanDescription
	 */
	public function setRatePlanDescription( $ratePlanDescription ): void {
		$this->ratePlanDescription = $ratePlanDescription;
	}

	/**
	 * @param mixed $currency
	 */
	public function setCurrency( $currency ): void {
		$this->currency = $currency;
	}

	/**
	 * @param mixed $billingTiming
	 */
	public function setBillingTiming( $billingTiming ): void {
		$this->billingTiming = $billingTiming;
	}

	/**
	 * @param mixed $automaticTerm
	 */
	public function setAutomaticTerm( $automaticTerm ): void {
		$this->automaticTerm = $automaticTerm;
	}

	/**
	 * @param mixed $billingInterval
	 */
	public function setBillingInterval( $billingInterval ): void {
		$this->billingInterval = $this->getBillingIntervalName( $billingInterval );
	}

	/**
	 * @param int $trialPeriodDays
	 */
	public function setTrialPeriodDays( $trialPeriodDays ): void {
		$this->trialPeriodDays = $trialPeriodDays;
	}

	/**
	 * @param int $customNumberOfDays
	 */
	public function setCustomNumberOfDays( int $customNumberOfDays ): void {
		$this->customNumberOfDays = $customNumberOfDays;
	}

	/**
	 * @param bool $inheritPaymentMethod
	 */
	public function setInheritPaymentMethod( bool $inheritPaymentMethod ): void {
		$this->inheritPaymentMethod = $inheritPaymentMethod;
	}

	public function getBillingIntervalName( $interval ): string {
		$billingInterval = array(
			'month' => 'Monthly',
			'week'  => 'Weekly',
			'year'  => 'Yearly',
			'day'   => 'Custom',
		);
		return $billingInterval[ $interval ];
	}

	public function get_object_as_array(): array {
		return get_object_vars( $this );
	}
}
