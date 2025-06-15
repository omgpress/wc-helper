<?php
namespace OmgWoo;

use OmgCore\Requirement;

defined( 'ABSPATH' ) || exit;

class OmgWoo {
	protected OrderStorage $order_storage;

	public function __construct( string $root_file, Requirement $requirement ) {
		$requirement->add( 'WooCommerce', 'WooCommerce' );

		$this->order_storage = new OrderStorage( $root_file );
	}

	public function order_storage(): OrderStorage {
		return $this->order_storage;
	}
}
