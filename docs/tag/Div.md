# Div

The `<div>` `HTML` element is the generic container for flow content.

It has no effect on the content or layout until styled in some way using CSS (e.g., styling is directly applied to it,
or some kind of layout model like Flexbox is applied to its parent element).

## Basic Usage

Instantiate the `Div` class using `Div::widget()`.

```php
$div = Div::widget();
```

Or, block style instantiation.

```php
<?= Div::begin() ?>
    // ... content to be wrapped by `div` element
<?= Div::end() ?>
```

## Setting Attributes

Use the provided methods to set specific attributes for the a element.

```php
// setting class attribute
$div->class('container');
```

Or, use the `attributes` method to set multiple attributes at once.

```php
$div->attributes(['class' => 'container', 'style' => 'background-color: #eee;']);
```

## Adding Content

If you want to include content within the `div` tag, use the `content` method.

```php
$div->content('My content');
```

Or, use `begin()` and `end()` methods to wrap content.

```php
<?= Div::begin() ?>
    My content
<?= Div::end() ?>
```

## Rendering

Generate the `HTML` output using the `render` method, for simple instantiation. 

```php
$html = $div->render();
```

For block style instantiation, use the `end()` method, which returns the `HTML` output.

```php
$html = Div::end();
```

Or, use the magic `__toString` method.

```php
$html = (string) $div;
```

## Common Use Cases

Below are examples of common use cases:

```php
// adding multiple attributes
$div->class('external')->content('My content');

// using data attributes
$div->dataAttributes(['analytics' => 'trackClick']);
```

Explore additional methods for setting various attributes such as `lang`, `name`, `style`, `title`, etc.

## Attributes

Refer to the [Attribute Tests](https://github.com/php-forge/html/blob/main/tests/Div/AttributeTest.php) for comprehensive
examples.

The following methods are available for setting attributes:

| Method            | Description                                                                                      |
| ----------------- | ------------------------------------------------------------------------------------------------ |
| `attributes()`    | Set multiple `attributes` at once.                                                               |
| `class()`         | Set the `class` attribute.                                                                       |
| `content()`       | Set the `content` within the `div` element.                                                      |
| `dataAttributes()`| Set multiple `data-attributes` at once.                                                          |
| `id()`            | Set the `id` attribute.                                                                          |
| `lang()`          | Set the `lang` attribute.                                                                        |
| `name()`          | Set the `name` attribute.                                                                        |
| `style()`         | Set the `style` attribute.                                                                       |
| `title()`         | Set the `title` attribute.                                                                       |

## Custom methods

Refer to the [Custom Methods Tests](https://github.com/php-forge/html/blob/main/tests/Div/CustomMethodTest.php) for
comprehensive examples.

The following methods are available for customizing the `HTML` output:

| Method    | Description                                                                                              |
| --------- | -------------------------------------------------------------------------------------------------------- |
| `begin() `| Start the `div` element.                                                                                 |
| `end()`   | End the `div` element, and generate the `HTML` output.                                                   |
| `render()`| Generates the `HTML` output.                                                                             |
| `widget()`| Instantiates the `Body::class`.                                                                          |
