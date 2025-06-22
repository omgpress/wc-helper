<?php
namespace OmgWoo;

use OmgCore\Dependency;

defined( 'ABSPATH' ) || exit;

class OmgWoo {
	protected OrderStorage $order_storage;

	public function __construct( string $root_file, Dependency $dependency ) {
		$dependency->require_plugin( 'woocommerce', 'WooCommerce', 'woocommerce/woocommerce.php' );

		$this->order_storage = new OrderStorage( $root_file );
	}

	public function order_storage(): OrderStorage {
		return $this->order_storage;
	}
}
