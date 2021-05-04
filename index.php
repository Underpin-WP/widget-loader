<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Add this loader.
add_action( 'underpin/before_setup', function ( $instance ) {

	if ( ! defined( 'UNDERPIN_WIDGETS_ROOT_DIR' ) ) {
		define( 'UNDERPIN_WIDGETS_ROOT_DIR', plugin_dir_path( __FILE__ ) );
	}
	require_once( UNDERPIN_WIDGETS_ROOT_DIR . 'lib/abstracts/Widget.php' );
	require_once( UNDERPIN_WIDGETS_ROOT_DIR . 'lib/loaders/Widgets.php' );
	require_once( UNDERPIN_WIDGETS_ROOT_DIR . 'lib/factories/Widget_Instance.php' );
	$instance->loaders()->add( 'widgets', [
		'registry' => 'Underpin_Widgets\Loaders\Widgets',
	] );
} );