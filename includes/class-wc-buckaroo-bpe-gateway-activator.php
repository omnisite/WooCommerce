<?php

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @package    Wc_Buckaroo_Bpe_Gateway
 * @subpackage Wc_Buckaroo_Bpe_Gateway/includes
 * @author     Buckaroo <support@buckaroo.nl>
 */

class Wc_Buckaroo_Bpe_Gateway_Activator {
	const DATABASE_VERSION_KEY = 'BUCKAROO_BPE_VERSION';

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since 1.0.0
	 */
	public static function activate() {
	}

	/**
	 * @access public
	 * @return boolean (true)
	 */
	public static function install() {
		if (self::isInstalled()) {
			return;
		}
		//fresh install
		self::set_db_version('0.0.0.0');
		(new Buckaroo_Migration_Handler())->handle();
		return true;
	}

	public static function isInstalled()
	{
		return self::get_db_version() !== false;
	}

	/**
	 * Get database version
	 *
	 * @return void
	 */
	public static function get_db_version()
	{
		return get_option(WC_Buckaroo_Install::DATABASE_VERSION_KEY);
	}

	/**
	 * Set database version
	 *
	 * @param string $version
	 *
	 * @return void
	 */
	public static function set_db_version($version)
	{
		update_option(WC_Buckaroo_Install::DATABASE_VERSION_KEY, $version);
	}
}
