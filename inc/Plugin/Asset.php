<?php
namespace MyWcAddon\Plugin;

use const MyWcAddon\KEY;

defined( 'ABSPATH' ) || exit;

class Asset extends \MyPlugin\Plugin\Asset {
	protected const KEY = KEY;
}
