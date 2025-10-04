<?php
namespace OmgWcHelper;

use Automattic\WooCommerce\Utilities\FeaturesUtil;
use Automattic\WooCommerce\Utilities\OrderUtil;
use Exception;
use OmgCore\Dependency;
use OmgCore\Feature;

defined( 'ABSPATH' ) || exit;

class WcHelper extends Feature {
	protected string $root_file;
	protected Dependency $dependency;

	/**
	 * WcHelper constructor.
	 *
	 * @param string $root_file The root file of the plugin or theme.
	 *
	 * @throws Exception
	 */
	public function __construct( string $root_file, Dependency $dependency ) {
		parent::__construct();

		$this->root_file  = $root_file;
		$this->dependency = $dependency;

		add_action( 'init', $this->init() );
		$this->declare_order_storage_compatibility();
	}

	protected function init(): callable {
		return function (): void {
			$this->dependency->require_plugin(
				'woocommerce',
				'WooCommerce',
				'woocommerce/woocommerce.php',
				false,
				'https://downloads.wordpress.org/plugin/woocommerce.zip'
			);
		};
	}

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
					$this->root_file,
					true
				);
			}
		);
	}
}
