<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Add this loader.
add_action( 'underpin/before_setup', function ( $class ) {
	if ( 'Underpin\Underpin' === $class ) {
		require_once( plugin_dir_path( __FILE__ ) . 'Widget.php' );
		require_once( plugin_dir_path( __FILE__ ) . 'Widget_Instance.php' );
		Underpin\underpin()->loaders()->add( 'widgets', [
			'instance' => 'Underpin_Widgets\Abstracts\Widget',
			'default'  => 'Underpin_Widgets\Factories\Widget_Instance',
		] );
	}
} );