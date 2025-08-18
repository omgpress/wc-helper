<?php
namespace OmgWcHelper;

use Exception;
use OmgCore\Dependency;
use OmgCore\OmgFeature;

defined( 'ABSPATH' ) || exit;

class WcHelper extends OmgFeature {
	protected OrderStorage $order_storage;

	/**
	 * WcHelper constructor.
	 *
	 * @param string $root_file The root file of the plugin or theme.
	 * @param Dependency $dependency The dependency manager instance.
	 *
	 * @throws Exception
	 */
	public function __construct( string $root_file, Dependency $dependency ) {
		parent::__construct();

		$dependency->require_plugin(
			'woocommerce',
			'WooCommerce',
			'woocommerce/woocommerce.php',
			false,
			'https://downloads.wordpress.org/plugin/woocommerce.zip'
		);

		$this->order_storage = new OrderStorage( $root_file );
	}

	/**
	 * Get the OrderStorage instance.
	 *
	 * Note: This library requires that your plugin or theme have HPOS compatible code.
	 *
	 * @return OrderStorage
	 */
	public function order_storage(): OrderStorage {
		return $this->order_storage;
	}
}
