<?php

namespace Underpin_Widgets\Factories;


use Underpin\Traits\Instance_Setter;
use Underpin_Widgets\Abstracts\Widget;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


class Widget_Instance extends Widget {

	use Instance_Setter;

	protected $get_fields_callback;
	protected $display_callback;

	public function __construct( $args ) {
		$this->set_values( $args );
		parent::__construct();
	}

	public function get_fields( $values ) {
		return $this->set_callable( $this->get_fields_callback, $values, $this );
	}

	public function widget( $args, $widget_args = 1 ) {
		return $this->set_callable( $this->display_callback, $args, $widget_args );
	}

}