<?php

namespace includes;
/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Wc_Buckaroo_Bpe_Gateway
 * @subpackage Wc_Buckaroo_Bpe_Gateway/includes
 * @author     Buckaroo <support@buckaroo.nl>
 */

class Wc_Buckaroo_Bpe_Gateway_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'wc-buckaroo-bpe-gateway',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
