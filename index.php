<?php
/**
 * Plugin Name: My WC Add-On
 * Plugin URI: https://wordpress.org
 * Description: The WooCommerce Add-On
 * Version: 1.0.0
 * Text Domain: my_wc_addon
 * Author: Developer
 * Author URI: https://wordpress.org
 * Requires PHP: 7.2.0
 * Requires at least: 5.0.0
 */
namespace MyWcAddon;

defined( 'ABSPATH' ) || exit;

const KEY       = 'my_wc_addon';
const ROOT_FILE = __FILE__;

$autoload = __DIR__ . '/vendor/autoload.php';

if ( ! file_exists( $autoload ) ) {
	throw new \Exception( 'Autoloader not exists' );
}

require_once $autoload;

new Setup();
