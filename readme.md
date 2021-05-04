# Underpin Widget Loader

Loader That assists with adding widgets to a WordPress website. It uses Underpin's built-in fields API to handle
the render, and storage of widget data

## Installation

### Using Composer

`composer require underpin/widget-loader`

### Manually

This plugin uses a built-in autoloader, so as long as it is required _before_
Underpin, it should work as-expected.

`require_once(__DIR__ . '/underpin-widgets/index.php');`

## Setup

1. Install Underpin. See [Underpin Docs](https://www.github.com/underpin-wp/underpin)
1. Register new widgets menus as-needed.

## Example

A very basic example could look something like this.

```php
// Register widget
underpin()->widgets()->add( 'hello-world-widget', [
	'name'                => underpin()->__( 'Hello World Widget' ),                               // Required. The name of the widget.
	'id_base'             => 'widget_name',                                                        // Required. The ID.
	'description'         => underpin()->__( 'Displays hello to a specified name on your site.' ), // Widget description.
	'widget_options'      => [                                                                     // Options to pass to widget. See wp_register_sidebar_widget
		'classname' => 'test_widget',
	],
	'get_fields_callback' => function ( $fields, \WP_Widget $widget ) {                            // Fetch, and set settings fields.
		$name = isset( $fields['name'] ) ? esc_html( $fields['name'] ) : 'world';

		return [
			new \Underpin\Factories\Settings_Fields\Text( $name, [
				'name'        => $widget->get_field_name( 'name' ), // See WP_Widget get_field_name
				'id'          => $widget->get_field_id( 'name' ),   // See WP_Widget get_field_id
				'setting_key' => 'name',                            // Must match field name and field ID
				'description' => underpin()->__( 'Optional. Specify the person to say hello to. Default "world".' ),
				'label'       => underpin()->__( 'Name' ),
			] ),
		];
	},
	'render_callback'    => function ( $instance, $fields ) {                                      // Render output
		$name = ! empty( $fields['name'] ) ? esc_html( $fields['name'] ) : 'world';

		echo underpin()->__( sprintf( 'Hello, %s!', $name ) );
	},
] );
```

Alternatively, you can extend `Widget` and reference the extended class directly, like so:

```php
underpin()->widgets()->add('widget-key','Namespace\To\Class');
```
