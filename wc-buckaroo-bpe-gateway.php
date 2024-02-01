<?php

/**
 * WC Buckaroo BPE Gateway
 *
 * @package   wc-buckaroo-bpe-gateway
 * @author    Buckaroo support@buckaroo.nl
 *
 * Plugin Name:     WC Buckaroo BPE Gateway
 * Plugin URI:      http://www.buckaroo.nl
 * Description:     Buckaroo payment system plugin for WooCommerce.
 * Version:         4.0.0
 * Author:          Buckaroo
 * Author URI:      http://www.buckaroo.nl
 * Text Domain:     wc-buckaroo-bpe-gateway
 * Namespace:       Buckaroo\WooCommerce
 */

declare( strict_types = 1 );

// If this file is called directly, abort.
use includes\Wc_Buckaroo_Bpe_Gateway;
use includes\Wc_Buckaroo_Bpe_Gateway_Activator;
use includes\Wc_Buckaroo_Bpe_Gateway_Deactivator;

if ( ! defined( 'WPINC' ) ) {
	die;
}
//	require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/gateway-buckaroo.php';

/**
 * Currently plugin version.
 */
define( 'WC_BUCKAROO_BPE_GATEWAY_VERSION', '1.0.0' );

if ( ! function_exists( 'is_plugin_active' ) ) {
	include_once ABSPATH . '/wp-admin/includes/plugin.php';
}

// Include Composer's autoload file if it exists
if (file_exists(plugin_dir_path(__FILE__) . 'vendor/autoload.php')) {
	require_once plugin_dir_path(__FILE__) . 'vendor/autoload.php';
}

/**
 * Check for the existence of WooCommerce, Buckaroo WooCommerce, WooCommerce Subscriptions
 */
function buckaroo_check_requirements() {
	$wc_active = is_plugin_active( 'woocommerce/woocommerce.php' );

	if ( $wc_active ) {
		return true;
	} else {
		render_notice( $wc_active, __( 'Buckaroo Subscriptions requires WooCommerce to be installed and active.', 'buckaroo_subscriptions' ) );
	}
}

/**
 * Render the notice
 */
function render_notice( $w_active, $message ) {
	if ( ! $w_active ) {
		add_action(
			'admin_notices',
			function() use ( $message ) {
				buckaroo_missing_plugin_notice( $message );
			}
		);
	}
}

/**
 * Display a message advising the required plugin is missing
 *
 * @param string $missing_plugin_message The message to display for the missing plugin.
 */
function buckaroo_missing_plugin_notice( $missing_plugin_message ) {
	$class = 'notice notice-error';

	printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), esc_html( $missing_plugin_message ) );
}

/**
 * The code that runs during plugin activation.
 */
function activate_wc_buckaroo_bpe_gateway() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wc-buckaroo-bpe-gateway-activator.php';
	Wc_Buckaroo_Bpe_Gateway_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 */
function deactivate_wc_buckaroo_bpe_gateway() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wc-buckaroo-bpe-gateway-deactivator.php';
	Wc_Buckaroo_Bpe_Gateway_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wc_buckaroo_bpe_gateway' );
register_deactivation_hook( __FILE__, 'deactivate_wc_buckaroo_bpe_gateway' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wc-buckaroo-bpe-gateway.php';

/**
 * Begins execution of the plugin.
 */
function run_wc_buckaroo_bpe_gateway() {
	if ( buckaroo_check_requirements() ) {
		$plugin = new Wc_Buckaroo_Bpe_Gateway();
		$plugin->run();
	}
}
run_wc_buckaroo_bpe_gateway();
