<?php
namespace ElementorHelloWorld;

/**
 * Class Plugin
 *
 * Main Plugin class
 * @since 1.2.0
 */
class Plugin {

	/**
	 * Instance
	 *
	 * @since 1.2.0
	 * @access private
	 * @static
	 *
	 * @var Plugin The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.2.0
	 * @access public
	 *
	 * @return Plugin An instance of the class.
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * widget_scripts
	 *
	 * Load required plugin core files.
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function widget_scripts() {
		wp_register_script( 'elementor-hello-world', plugins_url( '/resources/assets/js/hello-world.js', __FILE__ ), [ 'jquery' ], false, true );
		wp_register_script( 'app-index', plugin_dir_url( __FILE__ ) . 'app/index.js', [ 'wp-element' ], null, true );
		wp_register_script( 'build-index', plugin_dir_url( __FILE__ ) . '/build/app.22c6d8d2.js' );
		// wp_register_script( 'elementor-hero', plugins_url( '/build/index.js', __FILE__ ), [ 'elementor-frontend' ], '1.0.0', true );
	}

	/**
	 * Include Widgets files
	 *
	 * Load widgets files
	 *
	 * @since 1.2.0
	 * @access private
	 */
	private function include_widgets_files() {
		require_once( __DIR__ . '/widgets/hello-world.php' );
		require_once( __DIR__ . '/widgets/inline-editing.php' );
		require_once( __DIR__ . '/widgets/Hero/hero-component.php' );
	}

	/**
	 * Register Widgets
	 *
	 * Register new Elementor widgets.
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function register_widgets() {
		// Its is now safe to include Widgets files
		$this->include_widgets_files();

		// Register Widgets
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Hello_World() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Inline_Editing() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\hero_Component() );
	}

	/**
	 *  Plugin class constructor
	 *
	 * Register plugin action hooks and filters
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function __construct() {

		// Register widget scripts
		add_action( 'elementor/frontend/after_register_scripts', [ $this, 'widget_scripts' ] );

		// Register widgets
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );
	}
}

// Instantiate Plugin Class
Plugin::instance();
