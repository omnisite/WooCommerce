<?php

namespace Models;

use Buckaroo\PaymentMethods\Subscriptions\Models\RatePlanCharge as RatePlanChargeBuckaroo;

class RatePlanCharge extends RatePlanChargeBuckaroo {

	/**
	 * @return string
	 */
	public function getType(): string {
		return $this->type;
	}

	/**
	 * @param string $type
	 */
	public function setType( string $type ): void {
		$this->type = $type;
	}

	/**
	 * @param mixed $ratePlanChargeName
	 */
	public function setRatePlanChargeName( $ratePlanChargeName ): void {
		$this->ratePlanChargeName = $ratePlanChargeName;
	}

	/**
	 * @param mixed $rateplanChargeProductId
	 */
	public function setRateplanChargeProductId( $rateplanChargeProductId ): void {
		$this->rateplanChargeProductId = $rateplanChargeProductId;
	}

	/**
	 * @param mixed $rateplanChargeDescription
	 */
	public function setRateplanChargeDescription( $rateplanChargeDescription ): void {
		$this->rateplanChargeDescription = $rateplanChargeDescription;
	}

	/**
	 * @param mixed $unitOfMeasure
	 */
	public function setUnitOfMeasure( $unitOfMeasure ): void {
		$this->unitOfMeasure = $unitOfMeasure;
	}

	/**
	 * @param mixed $ratePlanChargeType
	 */
	public function setRatePlanChargeType( $ratePlanChargeType ): void {
		$this->ratePlanChargeType = $ratePlanChargeType;
	}

	/**
	 * @param mixed $baseNumberOfUnits
	 */
	public function setBaseNumberOfUnits( $baseNumberOfUnits ): void {
		$this->baseNumberOfUnits = $baseNumberOfUnits;
	}

	/**
	 * @param mixed $partialBilling
	 */
	public function setPartialBilling( $partialBilling ): void {
		$this->partialBilling = $partialBilling;
	}

	/**
	 * @param mixed $pricePerUnit
	 */
	public function setPricePerUnit( $pricePerUnit ): void {
		$this->pricePerUnit = $pricePerUnit;
	}

	/**
	 * @param mixed $priceIncludesVat
	 */
	public function setPriceIncludesVat( $priceIncludesVat ): void {
		$this->priceIncludesVat = $priceIncludesVat;
	}

	/**
	 * @param mixed $vatPercentage
	 */
	public function setVatPercentage( $vatPercentage ): void {
		$this->vatPercentage = $vatPercentage;
	}

	public function get_object_as_array(): array {
		return get_object_vars( $this );
	}
}
