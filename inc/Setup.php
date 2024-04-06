<?php
namespace MyWcAddon;

defined( 'ABSPATH' ) || exit;

class Setup {
	public function __construct() {
		WC\OrderStorage::declare_order_storage_compatibility();
		add_action( 'plugins_loaded', array( $this, 'init' ) );
	}

	public function init(): void {
		if ( \MyPlugin\Plugin\Dep::validate( $this->get_deps() ) ) {
			return;
		}

		load_plugin_textdomain( KEY, false, \MyPlugin\Plugin\Fs::get_path( 'lang' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_assets' ) );
	}

	public function enqueue_assets(): void {
		\MyPlugin\Plugin\Asset::enqueue_style( 'main' );
		\MyPlugin\Plugin\Asset::enqueue_script( 'main' );
	}

	protected function get_deps(): array {
		return array(
			'WooCommerce' => __( 'WooCommerce', KEY ),
		);
	}
}
