<?php
namespace OmgWoo;

use Automattic\WooCommerce\Utilities\FeaturesUtil;
use Automattic\WooCommerce\Utilities\OrderUtil;

defined( 'ABSPATH' ) || exit;

class OrderStorage {
	protected string $root_file;

	public function __construct( string $root_file ) {
		$this->root_file = $root_file;

		$this->declare_compatibility();
	}

	protected function declare_compatibility(): void {
		if ( ! class_exists( '\Automattic\WooCommerce\Utilities\FeaturesUtil' ) ) {
			return;
		}

		add_action(
			'before_woocommerce_init',
			function (): void {
				FeaturesUtil::declare_compatibility(
					'custom_order_tables',
					$this->root_file,
					true
				);
			}
		);
	}

	public function is_enabled(): bool {
		return class_exists( '\Automattic\WooCommerce\Utilities\OrderUtil' ) &&
			OrderUtil::custom_orders_table_usage_is_enabled();
	}
}
