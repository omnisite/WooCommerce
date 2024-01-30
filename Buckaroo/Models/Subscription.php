<?php

namespace Models;

/**
 * Class Subscription
 *
 * @package Models
 */
class Subscription {
	/**
	 * @var bool
	 */
	protected bool $includeTransaction;

	/**
	 * @var float
	 */
	protected float $transactionVatPercentage;

	/**
	 * @var string
	 */
	protected string $configurationCode;

	/**
	 * @var string
	 */
	protected string $subscriptionGuid;

	/**
	 * @var int
	 */
	protected int $termStartDay;

	/**
	 * @var int
	 */
	protected int $termStartMonth;

	/**
	 * @var int
	 */
	protected int $billingTiming;

	/**
	 * @var string
	 */
	protected string $termStartWeek;

	/**
	 * @var string
	 */
	protected string $b2b;

	/**
	 * @var string
	 */
	protected string $mandateReference;

	/**
	 * @var string
	 */
	protected string $allowedServices;

	/**
	 * @var string
	 */
	protected string $email;

	/**
	 * @var array
	 */
	protected array $configuration;

	/**
	 * @var array
	 */
	protected array $ratePlans;

	/**
	 * @var array
	 */
	protected array $ratePlanCharges;

	/**
	 * @var array
	 */
	protected array $person;

	/**
	 * @var array
	 */
	protected array $address;

	/**
	 * @var array
	 */
	protected array $debtor;

	/**
	 * @var string
	 */
	public string $customerIBAN;

	/**
	 * @var string
	 */
	public string $customerAccountName;

	/**
	 * @var string
	 */
	public string $customerBIC;

	/**
	 * @return array
	 */
	public function getAddress(): array {
		return $this->address;
	}

	/**
	 * @param array $address
	 */
	public function setAddress( array $address ): void {
		$this->address = $address;
	}

	/**
	 * @return array
	 */
	public function getDebtor() {
		return $this->debtor;
	}

	/**
	 * @param array $debtor
	 */
	public function setDebtor( $debtor ): void {
		$this->debtor['code'] = $debtor;
	}

	/**
	 * @return array
	 */
	public function getRatePlans(): array {
		return $this->ratePlans;
	}

	/**
	 * @param array $ratePlans
	 */
	public function setRatePlans( $type, $ratePlans ): void {
		$this->ratePlans[ $type ] = $ratePlans;
	}

	/**
	 * @return array
	 */
	public function getPerson() {
		return $this->person;
	}

	/**
	 * @param array $person
	 */
	public function setPerson( $person ): void {
		$this->person = $person;
	}

	/**
	 * @return array
	 */
	public function getRatePlanCharges() {
		return $this->ratePlanCharges;
	}

	/**
	 * @param array $ratePlanCharges
	 */
	public function setRatePlanCharges( $type, $ratePlanCharges ): void {
		$this->ratePlanCharges[ $type ] = $ratePlanCharges;
	}

	/**
	 * @return bool
	 */
	public function isIncludeTransaction(): bool {
		return $this->includeTransaction;
	}

	/**
	 * @param bool $includeTransaction
	 */
	public function setIncludeTransaction( bool $includeTransaction ): void {
		$this->includeTransaction = $includeTransaction;
	}

	/**
	 * @return float
	 */
	public function getTransactionVatPercentage(): float {
		return $this->transactionVatPercentage;
	}

	/**
	 * @param float $transactionVatPercentage
	 */
	public function setTransactionVatPercentage( float $transactionVatPercentage ): void {
		$this->transactionVatPercentage = $transactionVatPercentage;
	}

	/**
	 * @return string
	 */
	public function getConfigurationCode(): string {
		return $this->configurationCode;
	}

	/**
	 * @param string $configurationCode
	 */
	public function setConfigurationCode( string $configurationCode ): void {
		$this->configurationCode = $configurationCode;
	}

	/**
	 * @return string
	 */
	public function getSubscriptionGuid(): string {
		return $this->subscriptionGuid;
	}

	/**
	 * @param string $subscriptionGuid
	 */
	public function setSubscriptionGuid( string $subscriptionGuid ): void {
		$this->subscriptionGuid = $subscriptionGuid;
	}

	/**
	 * @return int
	 */
	public function getTermStartDay(): int {
		return $this->termStartDay;
	}

	/**
	 * @param int $termStartDay
	 */
	public function setTermStartDay( int $termStartDay ): void {
		$this->termStartDay = $termStartDay;
	}

	/**
	 * @return int
	 */
	public function getTermStartMonth(): int {
		return $this->termStartMonth;
	}

	/**
	 * @param int $termStartMonth
	 */
	public function setTermStartMonth( int $termStartMonth ): void {
		$this->termStartMonth = $termStartMonth;
	}

	/**
	 * @return int
	 */
	public function getBillingTiming(): int {
		return $this->billingTiming;
	}

	/**
	 * @param int $billingTiming
	 */
	public function setBillingTiming( int $billingTiming ): void {
		$this->billingTiming = $billingTiming;
	}

	/**
	 * @return string
	 */
	public function getTermStartWeek(): string {
		return $this->termStartWeek;
	}

	/**
	 * @param string $termStartWeek
	 */
	public function setTermStartWeek( string $termStartWeek ): void {
		$this->termStartWeek = $termStartWeek;
	}

	/**
	 * @return string
	 */
	public function getB2b(): string {
		return $this->b2b;
	}

	/**
	 * @param string $b2b
	 */
	public function setB2b( string $b2b ): void {
		$this->b2b = $b2b;
	}

	/**
	 * @return string
	 */
	public function getMandateReference(): string {
		return $this->mandateReference;
	}

	/**
	 * @param string $mandateReference
	 */
	public function setMandateReference( string $mandateReference ): void {
		$this->mandateReference = $mandateReference;
	}

	/**
	 * @return string
	 */
	public function getAllowedServices(): string {
		return $this->allowedServices;
	}

	/**
	 * @param string $allowedServices
	 */
	public function setAllowedServices( string $allowedServices ): void {
		$this->allowedServices = $allowedServices;
	}


	/**
	 * @return string
	 */
	public function getEmail(): string {
		return $this->email;
	}

	/**
	 * @param string $email
	 */
	public function setEmail( string $email ): void {
		$this->email = $email;
	}

	/**
	 * @return array
	 */
	public function getConfiguration() {
		return $this->configuration;
	}

	/**
	 * @param array $configuration
	 */
	public function setConfiguration( $configuration ): void {
		$this->configuration['name'] = $configuration;
	}

	/**
	 * @return string
	 */
	public function getCustomerIBAN(): string {
		return $this->customerIBAN;
	}

	/**
	 * @param string $customerIBAN
	 */
	public function setCustomerIBAN( string $customerIBAN ): void {
		$this->customerIBAN = $customerIBAN;
	}

	/**
	 * @return string
	 */
	public function getCustomerAccountName(): string {
		return $this->customerAccountName;
	}

	/**
	 * @param string $customerAccountName
	 */
	public function setCustomerAccountName( string $customerAccountName ): void {
		$this->customerAccountName = $customerAccountName;
	}

	/**
	 * @return string
	 */
	public function getCustomerBIC(): string {
		return $this->customerBIC;
	}

	/**
	 * @param string $customerBIC
	 */
	public function setCustomerBIC( string $customerBIC ): void {
		$this->customerBIC = $customerBIC;
	}

	public function get_object_as_array(): array {
		return get_object_vars( $this );
	}
}
