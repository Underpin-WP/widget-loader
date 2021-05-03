<?php

namespace Underpin_Widgets\Factories;


use Underpin\Traits\Instance_Setter;
use Underpin_Widgets\Abstracts\Widget;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


class Widget_Instance extends Widget {

	use Instance_Setter;

	protected $get_items_callback;
	protected $get_data_callback;

	public function __construct( $args ) {
		$this->set_values( $args );
	}

	public function get_items( $email, $page ) {
		return $this->set_callable( $this->get_items_callback, $email, $page );
	}

	function get_data( $item ) {
		return $this->set_callable( $this->get_data_callback, $item );
	}

	public function get_fields( $instance ) {
		// TODO: Implement get_fields() method.
	}

}