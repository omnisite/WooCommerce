<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://buckaroo.nl
 * @since             4.0.0
 * @package           Wc_buckaroo_bpe_gateway
 *
 * @wordpress-plugin
 * Plugin Name:       WC Buckaroo BPE Gateway
 * Plugin URI:        https://buckaroo.nl
 * Description:       Official Buckaroo payment system plugin for WooCommerce.
 * Version:           4.0.0
 * Author:            Buckaroo
 * Author URI:        https://buckaroo.nl
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wc_buckaroo_bpe_gateway
 * Domain Path:       /languages
 */

use Inpsyde\Modularity\Package;
use Inpsyde\Modularity\Properties\PluginProperties;
use Buckaroo\WooCommerce\Buckaroo;

use Throwable;

/**
 * Define the default root file of the plugin
 *
 * @since 1.0.0
 */
const BK_WC_PLUGIN_FILE = __FILE__;

/**
 * Currently plugin version.
 * Start at version 4.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('WC_BUCKAROO_BPE_GATEWAY_VERSION', '4.0.0');

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die();
}

function autoload()
{
    $autoloader = __DIR__ . '/vendor/autoload.php';
    $buckarooSdkAutoload =
        plugin_dir_path(BK_WC_PLUGIN_FILE) . 'vendor/autoload.php';

    if (file_exists($autoloader)) {
        /** @noinspection PhpIncludeInspection */
        require $autoloader;
    }

    if (file_exists($buckarooSdkAutoload)) {
        /** @noinspection PhpIncludeInspection */
        require $buckarooSdkAutoload;
    }

    return true;
}

/**
 * Initialize all the plugin things.
 *
 * @throws Throwable
 */
function initialize()
{
    autoload();

    $properties = PluginProperties::new(__FILE__);
    $bootstrap = Package::new($properties);

    $modules = [new Buckaroo(__FILE__)];

    $modules = apply_filters('buckaroo_wc_plugin_modules', $modules);

    $bootstrap->boot(...$modules);

    add_menu_page(
        'Buckaroo v4',
        'Buckaroo v4',
        'read',
        'admin.php?page=wc-settings&tab=buckaroo_settings',
        '',
        'data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjIiIGJhc2VQcm9maWxlPSJ0aW55LXBzIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAxNTAgMTUwIiB3aWR0aD0iMTUwIiBoZWlnaHQ9IjE1MCI+Cgk8dGl0bGU+bG9nby1zdmc8L3RpdGxlPgoJPHN0eWxlPgoJCXRzcGFuIHsgd2hpdGUtc3BhY2U6cHJlIH0KCQkuczAgeyBmaWxsOiAjY2RkOTA1IH0gCgk8L3N0eWxlPgoJPHBhdGggaWQ9IkxheWVyIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGNsYXNzPSJzMCIgZD0ibS0wLjA1IDAuODVoMjEuNGwxOS40NyA0My4wMWg2Mi4wOGwxOC40LTQzLjAxaDIxLjRsLTYyLjcxIDE0Ni44MmgtMTQuNzhsLTY1LjI4LTE0Ni44MnptOTQuODEgNjEuODVoLTQ1LjM3bDIzLjU0IDUyLjg3bDIxLjgzLTUyLjg3eiIgLz4KPC9zdmc+',
        '55.3'
    );
}

add_action('plugins_loaded', __NAMESPACE__ . '\\initialize');

register_activation_hook(__FILE__, [
    'Buckaroo\WooCommerce\Config\Setup',
    'activate',
]);
