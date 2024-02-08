# Ol

The `<ol>` `HTML` element represents an ordered list of items, typically rendered as a numbered list.

## Basic Usage

Instantiate the `Ol` class using `Ol::widget()`.

```php
$ol = Ol::widget();
```

## Setting Attributes

Use the provided methods to set specific attributes for the a element.

```php
// setting class attribute
$ol->class('external');
```

Or, use the `attributes` method to set multiple attributes at once.

```php
$ol->attributes(['class' => 'external', 'title' => 'External Link']);
```

## Adding Content

If you want to include content within the `ol` tag, use the `content` method.

```php
$ol->content('myContent');
```

## Rendering

Generate the `HTML` output using the `render` method.

```php
$html = $ol->render();
```

Or, use the magic `__toString` method.

```php
$html = (string) $ol;
```

## Common Use Cases

Below are examples of common use cases:

```php
// adding multiple attributes
$ol->class('external')->content('myContent')->title('External Link');
```

Explore additional methods for setting various attributes such as `lang`, `tabindex`, `title`, `value` and more.

## Attributes

Refer to the [Attribute Tests](https://github.com/php-forge/html/blob/main/tests/Ol/AttributeTest.php) for comprehensive
examples.

The following methods are available for setting attributes:

| Method            | Description                                                                                      |
| ----------------- | ------------------------------------------------------------------------------------------------ |
| `attributes()`    | Set multiple `attributes` at once.                                                               |
| `class()`         | Set the `class` attribute.                                                                       |
| `content()`       | Set the `content` within the `ol` element.                                                       |
| `id()`            | Set the `id` attribute.                                                                          |
| `lang()`          | Set the `lang` attribute.                                                                        |
| `name()`          | Set the `name` attribute.                                                                        |
| `reversed()`      | Set the `reversed` attribute.                                                                    |
| `start()`         | Set the `start` attribute.                                                                       |
| `style()`         | Set the `style` attribute.                                                                       |
| `tabindex()`      | Set the `tabindex` attribute.                                                                    |
| `title()`         | Set the `title` attribute.                                                                       |
| `type()`          | Set the `type` attribute.                                                                        |
| `value()`         | Set the `value` attribute.                                                                       |

## Custom methods

Refer to the [Custom Method Test](https://github.com/php-forge/html/blob/main/tests/Ol/CustomMethodTest.php) for 
comprehensive examples.

The following methods are available for customizing the `HTML` output:

| Method                       | Description                                                                           |
| ---------------------------- | ------------------------------------------------------------------------------------- |
| `render()`                   | Generates the `HTML` output.                                                          |
| `widget()`                   | Instantiates the `Ol::class`.                                                         |
