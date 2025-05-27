<?php
namespace StarterWooAddon;

defined( 'ABSPATH' ) || exit;

class OrderStorage {
	public static function declare_compatibility(): void {
		if ( ! class_exists( '\Automattic\WooCommerce\Utilities\FeaturesUtil' ) ) {
			return;
		}

		add_action(
			'before_woocommerce_init',
			function(): void {
				\Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'custom_order_tables', ROOT_FILE, true );
			}
		);
	}

	public static function is_enabled(): bool {
		return class_exists( '\Automattic\WooCommerce\Utilities\OrderUtil' ) &&
			\Automattic\WooCommerce\Utilities\OrderUtil::custom_orders_table_usage_is_enabled();
	}
}
