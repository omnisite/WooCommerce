<?php

namespace Buckaroo\Client;

use Buckaroo\BuckarooClient;
use BuckarooPaymentMethod;
use Exception;

class Client extends BuckarooClient {

	/**
	 * @throws Exception
	 */
	public function __construct( BuckarooPaymentMethod $payment_method = null ) {
		$master_settings = get_option( 'woocommerce_buckaroo_mastersettings_settings', null );

		if ( $master_settings ) {
			$mode = $payment_method ? $payment_method->mode : null;

			parent::__construct( $master_settings['merchantkey'], $master_settings['secretkey'], $mode );
		} else {
			throw new Exception( 'Buckaroo master settings not found.' );
		}
	}
}
