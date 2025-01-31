<?php
namespace MyWcAddon;

defined( 'ABSPATH' ) || exit;

class Setup {
	public function __construct() {
		OrderStorage::declare_compatibility();
		new Activation();
		new Deactivation();
		new Admin();

		add_action( 'plugins_loaded', array( $this, 'init' ) );
		add_action( 'init', array( $this, 'load_textdomain' ) );
	}

	public function init(): void {
		Requirement::add(
			'WooCommerce',
			__( 'WooCommerce', 'my-wc-addon' )
		);

		if ( Requirement::validate() ) {
			return;
		}
	}

	public function load_textdomain(): void {
		load_plugin_textdomain( 'my-wc-addon', false, Fs::get_path( 'lang' ) );
	}

	public static function get_plugin_name(): ?string {
		return static::get_plugin_data()['Name'] ?? null;
	}

	public static function get_version(): ?string {
		return static::get_plugin_data()['Version'] ?? null;
	}

	protected static function get_plugin_data(): array {
		if ( ! function_exists( 'get_plugin_data' ) ) {
			require_once ABSPATH . 'wp-admin/includes/plugin.php';
		}

		return get_plugin_data( ROOT_FILE );
	}
}
