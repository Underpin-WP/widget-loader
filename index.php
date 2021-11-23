<?php

use Underpin\Abstracts\Underpin;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Add this loader.
Underpin::attach( 'setup', new \Underpin\Factories\Observer( 'widgets', [
	'update' => function ( Underpin $plugin, $args ) {
	if ( ! defined( 'UNDERPIN_WIDGETS_ROOT_DIR' ) ) {
		define( 'UNDERPIN_WIDGETS_ROOT_DIR', plugin_dir_path( __FILE__ ) );
	}
	require_once( UNDERPIN_WIDGETS_ROOT_DIR . 'lib/abstracts/Widget.php' );
	require_once( UNDERPIN_WIDGETS_ROOT_DIR . 'lib/loaders/Widgets.php' );
	require_once( UNDERPIN_WIDGETS_ROOT_DIR . 'lib/factories/Widget_Instance.php' );
	$plugin->loaders()->add( 'widgets', [
		'class' => 'Underpin\Widgets\Loaders\Widgets',
	] );
	},
] ) );