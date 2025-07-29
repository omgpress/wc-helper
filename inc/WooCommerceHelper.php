<?php
namespace OmgWooCommerceHelper;

use OmgCore\Dependency;
use OmgCore\OmgFeature;

defined( 'ABSPATH' ) || exit;

class WoocommerceHelper extends OmgFeature {
	protected OrderStorage $order_storage;

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

	public function order_storage(): OrderStorage {
		return $this->order_storage;
	}
}
