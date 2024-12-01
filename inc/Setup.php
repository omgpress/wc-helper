<?php
namespace MyWcAddon;

defined( 'ABSPATH' ) || exit;

class Setup {
	public function __construct() {
		new Admin();
		WC\OrderStorage::declare_order_storage_compatibility();

		add_action( 'plugins_loaded', array( $this, 'init' ) );
		add_action( 'init', array( $this, 'load_textdomain' ) );
	}

	public function init(): void {
		if ( Dep::validate( $this->get_deps() ) ) {
			return;
		}
	}

	public function load_textdomain(): void {
		load_plugin_textdomain( KEY, false, Fs::get_path( 'lang' ) );
	}

	protected function get_deps(): array {
		return array(
			'WooCommerce' => __( 'WooCommerce', KEY ),
		);
	}
}
