<?php

namespace Buckaroo\WooCommerce\admin;
/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wc_Buckaroo_Bpe_Gateway
 * @subpackage Wc_Buckaroo_Bpe_Gateway/admin
 * @author     Buckaroo <support@buckaroo.nl>
 */
class Wc_Buckaroo_Bpe_Gateway_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the admin area.
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wc-buckaroo-bpe-gateway-admin.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the admin area.

	 */
	public function enqueue_scripts() {

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wc-buckaroo-bpe-gateway-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Load dependencies for additional WooCommerce settings
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	public function wc_buckaroo_bpe_gateway_add_settings( $settings ) {
		include_once __DIR__.'/gateway-buckaroo-mastersettings.php';

		$settings[] = include plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-wc-buckaroo-bpe-gateway-settings.php';
		return $settings;
	}
}
