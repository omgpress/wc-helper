<?php
namespace OmgWcHelper;

use Automattic\WooCommerce\Utilities\FeaturesUtil;
use Automattic\WooCommerce\Utilities\OrderUtil;
use OmgCore\OmgFeature;
use Exception;

defined( 'ABSPATH' ) || exit;

class OrderStorage extends OmgFeature {
	protected string $root_file;

	/**
	 * @throws Exception
	 * @ignore
	 */
	public function __construct( string $root_file ) {
		parent::__construct();

		$this->root_file = $root_file;

		$this->declare_compatibility();
	}

	/**
	 * Check if the custom orders table feature is enabled.
	 *
	 * @return bool True if the custom orders table feature is enabled, false otherwise.
	 */
	public function is_enabled(): bool {
		return class_exists( '\Automattic\WooCommerce\Utilities\OrderUtil' ) &&
			OrderUtil::custom_orders_table_usage_is_enabled();
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
}
