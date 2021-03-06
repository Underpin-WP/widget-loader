<?php

namespace Underpin\Widgets\Loaders;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Underpin\Abstracts\Registries\Object_Registry;
use Underpin\Loaders\Logger;
use WP_Error;
use WP_Widget;


/**
 * Class Widgets
 * Registry for Cron Jobs
 *
 * @since   1.0.0
 * @package Underpin\Registries\Loaders
 */
class Widgets extends Object_Registry {

	/**
	 * @inheritDoc
	 */
	protected $abstraction_class = 'Underpin\Widgets\Abstracts\Widget';

	protected $default_factory = 'Underpin\Widgets\Factories\Widget_Instance';

	/**
	 * @inheritDoc
	 */
	protected function set_default_items() {
	}

	/**
	 * @inheritDoc
	 */
	public function add( $key, $value ) {
		$valid = parent::add( $key, $value );

		if ( true === $valid ) {
			add_action( 'widgets_init', function () use ( $key ) {
				register_widget( $this->get( $key ) );
				Logger::log(
					'notice',
					'widget_registered_successfully',
					'A widget was Was successfully registered.',
					[ 'key' => $key ]
				);
			} );
		}

		return $valid;
	}

	/**
	 * @param string $key
	 *
	 * @return WP_Widget|WP_Error Script Resulting WP_Widget class, if it exists. WP_Error, otherwise.
	 */
	public function get( $key ) {
		return parent::get( $key );
	}

}