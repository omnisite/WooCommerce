<?php
declare( strict_types = 1 );
namespace Buckaroo\WooCommerce;

use Buckaroo\WooCommerce\includes\Wc_Buckaroo_Bpe_Gateway;
use Buckaroo\WooCommerce\includes\Wc_Buckaroo_Bpe_Gateway_Activator;
use Buckaroo\WooCommerce\includes\Wc_Buckaroo_Bpe_Gateway_Deactivator;

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

function buckaroo_page_menu(): void {
	add_menu_page(
		'Buckaroo',
		'Buckaroo',
		'read',
		'admin.php?page=wc-settings&tab=buckaroo_settings',
		'',
		'data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjIiIGJhc2VQcm9maWxlPSJ0aW55LXBzIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAxNTAgMTUwIiB3aWR0aD0iMTUwIiBoZWlnaHQ9IjE1MCI+Cgk8dGl0bGU+bG9nby1zdmc8L3RpdGxlPgoJPHN0eWxlPgoJCXRzcGFuIHsgd2hpdGUtc3BhY2U6cHJlIH0KCQkuczAgeyBmaWxsOiAjY2RkOTA1IH0gCgk8L3N0eWxlPgoJPHBhdGggaWQ9IkxheWVyIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGNsYXNzPSJzMCIgZD0ibS0wLjA1IDAuODVoMjEuNGwxOS40NyA0My4wMWg2Mi4wOGwxOC40LTQzLjAxaDIxLjRsLTYyLjcxIDE0Ni44MmgtMTQuNzhsLTY1LjI4LTE0Ni44MnptOTQuODEgNjEuODVoLTQ1LjM3bDIzLjU0IDUyLjg3bDIxLjgzLTUyLjg3eiIgLz4KPC9zdmc+',
		'55.3'
	);
	add_submenu_page(
		'admin.php?page=wc-settings&tab=buckaroo_settings',
		esc_html__('Settings',  'wc-buckaroo-bpe-gateway'),
		esc_html__('Settings',  'wc-buckaroo-bpe-gateway'),
		'manage_options',
		'admin.php?page=wc-settings&tab=buckaroo_settings'
	);
	add_submenu_page(
		'admin.php?page=wc-settings&tab=buckaroo_settings',
		esc_html__('Payment methods',  'wc-buckaroo-bpe-gateway'),
		esc_html__('Payment methods',  'wc-buckaroo-bpe-gateway'),
		'manage_options',
		'admin.php?page=wc-settings&tab=buckaroo_settings&section=methods'
	);
	add_submenu_page(
		'admin.php?page=wc-settings&tab=buckaroo_settings',
		esc_html__('Report',  'wc-buckaroo-bpe-gateway'),
		esc_html__('Report',  'wc-buckaroo-bpe-gateway'),
		'manage_options',
		'admin.php?page=wc-settings&tab=buckaroo_settings&section=report'
	);
}

add_action('admin_menu', 'Buckaroo\WooCommerce\buckaroo_page_menu');

run_wc_buckaroo_bpe_gateway();
