<?php
namespace MyWcAddon\WC;

use const MyWcAddon\ROOT_FILE;

defined( 'ABSPATH' ) || exit;

class OrderStorage {
	public static function declare_order_storage_compatibility() {
		if ( class_exists( 'Automattic\WooCommerce\Utilities\FeaturesUtil' ) ) {
			return;
		}

		add_action(
			'before_woocommerce_init',
			function(): void {
				\Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'custom_order_tables', ROOT_FILE, true );
			}
		);
	}
}
