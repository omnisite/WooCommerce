<?php

namespace Models;

use Buckaroo\Models\Person as PersonBuckaroo;

class Person extends PersonBuckaroo {
	/**
	 * @param string $firstName
	 */
	public function setFirstName( string $firstName ): void {
		$this->firstName = $firstName;
	}

	/**
	 * @param string $lastName
	 */
	public function setLastName( string $lastName ): void {
		$this->lastName = $lastName;
	}

	/**
	 * @param string $culture
	 */
	public function setCulture( string $culture ): void {
		$this->culture = $culture;
	}

	public function get_object_as_array(): array {
		return get_object_vars( $this );
	}
}
