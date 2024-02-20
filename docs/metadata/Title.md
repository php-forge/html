# Title

The `<title>` `HTML` element defines the document's title shown in a browser's title bar or a page's tab.

It only contains text; tags within the element are ignored.

## Basic Usage

Instantiate the `Title` class using `Title::widget()`.

```php
$title = Title::widget();
```

Or, block style instantiation.

```php
<?= Title::begin() ?>
    // ... content to be wrapped by `div` element
<?= Title::end() ?>
```

## Setting Attributes

Use the provided methods to set specific attributes for the a element.

```php
// setting class attribute
$title->class('container');
```

Or, use the `attributes` method to set multiple attributes at once.

```php
$title->attributes(['class' => 'container', 'style' => 'background-color: #eee;']);
```

## Adding Content

If you want to include content within the `div` tag, use the `content` method.

```php
$title->content('MyContent');
```

Or, use `begin()` and `end()` methods to wrap content.

```php
<?= Title::begin() ?>
    My content
<?= Title::end() ?>
```

## Rendering

Generate the `HTML` output using the `render` method, for simple instantiation. 

```php
$html = $title->render();
```

Or, use the magic `__toString` method.

```php
$html = (string) $title;
```

## Common Use Cases

Below are examples of common use cases:

```php
// adding multiple attributes
$title->class('external')->content('MyContent');

// using data attributes
$title->dataAttributes(['analytics' => 'trackClick']);
```

Explore additional methods for setting various attributes such as `lang`, `name`, `style`, `title`, etc.

## Attributes

Refer to the [Attribute Tests](https://github.com/php-forge/html/blob/main/tests/Metadata/Title/AttributeTest.php) for
comprehensive examples.

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

Refer to the [Custom Methods Tests](https://github.com/php-forge/html/blob/main/tests/Metadata/Title/CustomMethodTest.php)
for comprehensive examples.

The following methods are available for customizing the `HTML` output:

| Method    | Description                                                                                              |
| --------- | -------------------------------------------------------------------------------------------------------- |
| `begin()` | Initializes the `Title` widget.                                                                          |
| `end()`   | Finalizes the `Title` widget.                                                                            |
| `render()`| Generates the `HTML` output.                                                                             |
| `widget()`| Instantiates the `Title::class`.                                                                         |
