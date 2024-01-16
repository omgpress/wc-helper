<?php
namespace MyWcAddon\Plugin;

use const MyWcAddon\KEY;
use const MyWcAddon\ROOT_FILE;

defined( 'ABSPATH' ) || exit;

class Dep extends \MyPlugin\Plugin\Dep {
	protected const KEY       = KEY;
	protected const ROOT_FILE = ROOT_FILE;
}
