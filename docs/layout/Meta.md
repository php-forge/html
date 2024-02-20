# Meta

The `<meta>` `HTML` element represents metadata that cannot be represented by other HTML meta-related elements, like
`<base>`, `<link>`, `<script>`, `<style>`, or `<title>`.

## Basic Usage

Instantiate the `Meta` class using `Meta::widget()`.

```php
$meta = Meta::widget();
```

## Setting Attributes

Use the provided methods to set specific attributes for the a element.

```php
// setting class attribute
$meta->class('external');
```

Or, use the `attributes` method to set multiple attributes at once.

```php
$meta->attributes(['class' => 'external', 'id' => 'MyId']);
```

## Adding Content

If you want to include content within the `meta` tag, use the `content` method.

The first parameter is the `name` attribute and the second parameter is the `content` value.

```php
$meta->content('csrf', 'value');
```

### Adding HTTP-Equiv

If you want to include `http-equiv` within the `meta` tag, use the `httpEquiv` method.

The first parameter is the `http-equiv` attribute and the second parameter is the `content` value.

```php
$meta->httpEquiv('refresh', '30');
```

## Rendering

Generate the `HTML` output using the `render` method.

```php
$html = $meta->render();
```

Or, use the magic `__toString` method.

```php
$html = (string) $meta;
```

## Common Use Cases

Below are examples of common use cases:

```php
// adding multiple attributes
$meta->class('external')->content('viewport', 'width=device-width, initial-scale=1');
```

Explore additional methods for setting various attributes such as `httpEquiv`, `id`, `lang` and more.

## Attributes

Refer to the [Attribute Tests](https://github.com/php-forge/html/blob/main/tests/Meta/AttributeTest.php) for comprehensive
examples.

The following methods are available for setting attributes:

| Method            | Description                                                                                      |
| ----------------- | ------------------------------------------------------------------------------------------------ |
| `attributes()`    | Set multiple `attributes` at once.                                                               |
| `charset()`       | Set the `charset` attribute.                                                                     |
| `class()`         | Set the `class` attribute.                                                                       |
| `content()`       | Set the `content` within the `meta` element.                                                     |
| `httpEquiv()`     | Set the `http-equiv` attribute.                                                                  |
| `id()`            | Set the `id` attribute.                                                                          |
| `lang()`          | Set the `lang` attribute.                                                                        |
| `name()`          | Set the `name` attribute.                                                                        |
| `style()`         | Set the `style` attribute.                                                                       |

## Custom methods

Refer to the [Custom Method Test](https://github.com/php-forge/html/blob/main/tests/Meta/CustomMethodTest.php) for 
comprehensive examples.

The following methods are available for customizing the `HTML` output:

| Method                       | Description                                                                           |
| ---------------------------- | ------------------------------------------------------------------------------------- |
| `render()`                   | Generates the `HTML` output.                                                          |
| `widget()`                   | Instantiates the `Meta::class`.                                                       |
