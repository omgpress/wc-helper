<?php
namespace MyWcAddon\Plugin;

use const MyWcAddon\ROOT_FILE;

defined( 'ABSPATH' ) || exit;

class Fs extends \MyPlugin\Plugin\Fs {
	protected const ROOT_FILE = ROOT_FILE;
}
