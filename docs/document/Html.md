# Html

The `<html>` `HTML` element represents the root (top-level element) of an HTML document, so it is also referred to as
the root element. All other elements must be descendants of this element.

## Basic Usage

Instantiate the `Html` class using `Html::widget()`.

```php
$html = Html::widget();
```

Or, block style instantiation.

```php
<?= Html::begin() ?>
    // ... content to be wrapped by `html` element
<?= Html::end() ?>
```

## Setting Attributes

Use the provided methods to set specific attributes for the a element.

```php
// setting class attribute
$html->class('container');
```

Or, use the `attributes` method to set multiple attributes at once.

```php
$html->attributes(['class' => 'container', 'style' => 'background-color: #eee;']);
```

## Adding Content

If you want to include content within the `html` tag, use the `content` method.

```php
$html->content('MyContent');
```

Or, use `begin()` and `end()` methods to wrap content.

```php
<?= Html::begin() ?>
    My content
<?= Html::end() ?>
```

## Rendering

Generate the `HTML` output using the `render` method, for simple instantiation. 

```php
$html = $html->render();
```

For block style instantiation, use the `end()` method, which returns the `HTML` output.

```php
$html = Html::end();
```

Or, use the magic `__toString` method.

```php
$html = (string) $html;
```

## Common Use Cases

Below are examples of common use cases:

```php
// adding multiple attributes
$html->class('external')->content('MyContent');

// using data attributes
$html->dataAttributes(['analytics' => 'trackClick']);
```

Explore additional methods for setting various attributes such as `lang`, `name`, `style`, `title`, etc.

## Attributes

Refer to the [Attribute Tests](https://github.com/php-forge/html/blob/main/tests/Document/Html/AttributeTest.php) for
comprehensive examples.

The following methods are available for setting attributes:

| Method            | Description                                                                                      |
| ----------------- | ------------------------------------------------------------------------------------------------ |
| `attributes()`    | Set multiple `attributes` at once.                                                               |
| `class()`         | Set the `class` attribute.                                                                       |
| `content()`       | Set the `content` within the `html` element.                                                     |
| `dataAttributes()`| Set multiple `data-attributes` at once.                                                          |
| `id()`            | Set the `id` attribute.                                                                          |
| `lang()`          | Set the `lang` attribute.                                                                        |
| `name()`          | Set the `name` attribute.                                                                        |
| `style()`         | Set the `style` attribute.                                                                       |
| `title()`         | Set the `title` attribute.                                                                       |

## Custom methods

Refer to the [Custom Methods Tests](https://github.com/php-forge/html/blob/main/tests/Document/Html/CustomMethodTest.php)
for comprehensive examples.

The following methods are available for customizing the `HTML` output:

| Method    | Description                                                                                              |
| --------- | -------------------------------------------------------------------------------------------------------- |
| `begin() `| Start the `html` element.                                                                                |
| `end()`   | End the `html` element, and generate the `HTML` output.                                                  |
| `render()`| Generates the `HTML` output.                                                                             |
| `widget()`| Instantiates the `Html::class`.                                                                          |
