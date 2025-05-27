<?php
/**
 * Plugin Name: Starter WooCommerce Add-On
 * Plugin URI: https://omgpress.com/starter?type=plugin
 * Description: The WooCommerce Add-On
 * Version: 1.0.0
 * Text Domain: starter-woo-addon
 * Author: OmgPress
 * Author URI: https://omgpress.com
 * Requires PHP: 7.4.0
 * Requires at least: 5.0.0
 */
namespace StarterWooAddon;

use Exception;

defined( 'ABSPATH' ) || exit;

const KEY       = 'starter_woo_addon';
const ROOT_FILE = __FILE__;

$autoload = __DIR__ . '/vendor/autoload.php';

if ( ! file_exists( $autoload ) ) {
	throw new Exception( 'Autoloader not exists' );
}

require_once $autoload;

new Setup();
