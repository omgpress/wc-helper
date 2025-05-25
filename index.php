<?php
/**
 * Plugin Name: OmgPress WooCommerce Add-On
 * Plugin URI: https://omgpress.com
 * Description: The WooCommerce Add-On
 * Version: 1.0.0
 * Text Domain: omgwoo
 * Author: Developer
 * Author URI: https://omgpress.com
 * Requires PHP: 7.4.0
 * Requires at least: 5.0.0
 */
namespace OmgWoo;

use Exception;

defined( 'ABSPATH' ) || exit;

const KEY       = 'my_wc_addon';
const ROOT_FILE = __FILE__;

$autoload = __DIR__ . '/vendor/autoload.php';

if ( ! file_exists( $autoload ) ) {
	throw new Exception( 'Autoloader not exists' );
}

require_once $autoload;

new Setup();
