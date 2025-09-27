<?php
namespace OmgWcHelper;

use Automattic\WooCommerce\Utilities\FeaturesUtil;
use Automattic\WooCommerce\Utilities\OrderUtil;
use Exception;
use OmgCore\OmgFeature;
use OmgCore\OmgApp;

defined( 'ABSPATH' ) || exit;

class WcHelper extends OmgFeature {
	/**
	 * WcHelper constructor.
	 *
	 * @param OmgApp $app The application instance.
	 *
	 * @throws Exception
	 */
	public function __construct( OmgApp $app ) {
		parent::__construct( $app );

		$app->dependency()->require_plugin(
			'woocommerce',
			'WooCommerce',
			'woocommerce/woocommerce.php',
			false,
			'https://downloads.wordpress.org/plugin/woocommerce.zip'
		);
		$this->declare_order_storage_compatibility();
	}

	protected string $root_file;

	/**
	 * Check if the custom orders table feature is enabled.
	 *
	 * @return bool True if the custom orders table feature is enabled, false otherwise.
	 */
	public function is_order_storage_enabled(): bool {
		return class_exists( '\Automattic\WooCommerce\Utilities\OrderUtil' ) &&
			OrderUtil::custom_orders_table_usage_is_enabled();
	}

	protected function declare_order_storage_compatibility(): void {
		if ( ! class_exists( '\Automattic\WooCommerce\Utilities\FeaturesUtil' ) ) {
			return;
		}

		add_action(
			'before_woocommerce_init',
			function (): void {
				FeaturesUtil::declare_compatibility(
					'custom_order_tables',
					$this->app->get_root_file(),
					true
				);
			}
		);
	}
}
