# Underpin Widget Loader

Loader That assists with adding GDPR-compliant widgets to a WordPress website.

## Installation

### Using Composer

`composer require underpin/widget-loader`

### Manually

This plugin uses a built-in autoloader, so as long as it is required _before_
Underpin, it should work as-expected.

`require_once(__DIR__ . '/underpin-widgets/widgets.php');`

## Setup

1. Install Underpin. See [Underpin Docs](https://www.github.com/underpin-wp/underpin)
1. Register new widgets menus as-needed.

## Example

A very basic example could look something like this.

```php
// Register widget
underpin()->widgets()->add( 'widget', [
	'id'                  => 'example-widget',                    // required
	'name'                => __( 'translate-able name', 'domain' ), // required
	'get_data_callback'   => '__return_empty_array',                // Required. See Widget::get_data
	'get_items_callback'  => '__return_true',                       // Required. See Widget::get_items
] );
```

Alternatively, you can extend `Widget` and reference the extended class directly, like so:

```php
underpin()->widgets()->add('widget-key','Namespace\To\Class');
```