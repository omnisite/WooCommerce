<?php

namespace Buckaroo\Models;

/**
 * Class Address
 */
class Address {
	/**
	 * Set Street.
	 *
	 * @param string $street Street.
	 */
	public function setStreet( string $street ): void {
		$this->street = $street;
	}

	/**
	 * @param string $city
	 */
	public function setCity( string $city ): void {
		$this->city = $city;
	}

	/**
	 * @param string $zipcode
	 */
	public function setZipCode( string $zipcode ): void {
		$this->zipcode = $zipcode;
	}

	/**
	 * @param string $country
	 */
	public function setCountry( string $country ): void {
		$this->country = $country;
	}

	public function get_object_as_array(): array {
		return get_object_vars( $this );
	}
}
