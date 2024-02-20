# Header

The `<header>` `HTML` element represents introductory content, typically a group of introductory or navigational aids.

It may contain some heading elements but also a logo, a search form, an author name, and other elements.

## Basic Usage

Instantiate the `Header` class using `Header::widget()`.

```php
$header = Header::widget();
```

Or, block style instantiation.

```php
<?= Header::begin() ?>
    // ... content to be wrapped by `header` element
<?= Header::end() ?>
```

## Setting Attributes

Use the provided methods to set specific attributes for the a element.

```php
// setting class attribute
$header->class('container');
```

Or, use the `attributes` method to set multiple attributes at once.

```php
$header->attributes(['class' => 'container', 'style' => 'background-color: #eee;']);
```

## Adding Content

If you want to include content within the `header` tag, use the `content` method.

```php
$header->content('MyContent');
```

Or, use `begin()` and `end()` methods to wrap content.

```php
<?= Header::begin() ?>
    My content
<?= Header::end() ?>
```

## Rendering

Generate the `HTML` output using the `render` method, for simple instantiation. 

```php
$html = $header->render();
```

For block style instantiation, use the `end()` method, which returns the `HTML` output.

```php
$html = Header::end();
```

Or, use the magic `__toString` method.

```php
$html = (string) $header;
```

## Common Use Cases

Below are examples of common use cases:

```php
// adding multiple attributes
$header->class('external')->content('MyContent');

// using data attributes
$header->dataAttributes(['analytics' => 'trackClick']);
```

Explore additional methods for setting various attributes such as `lang`, `name`, `style`, `title`, etc.

## Attributes

Refer to the [Attribute Tests](https://github.com/php-forge/html/blob/main/tests/Layout/Header/AttributeTest.php) for
comprehensive examples.

The following methods are available for setting attributes:

| Method            | Description                                                                                      |
| ----------------- | ------------------------------------------------------------------------------------------------ |
| `attributes()`    | Set multiple `attributes` at once.                                                               |
| `class()`         | Set the `class` attribute.                                                                       |
| `content()`       | Set the `content` within the `header` element.                                                   |
| `dataAttributes()`| Set multiple `data-attributes` at once.                                                          |
| `id()`            | Set the `id` attribute.                                                                          |
| `lang()`          | Set the `lang` attribute.                                                                        |
| `name()`          | Set the `name` attribute.                                                                        |
| `style()`         | Set the `style` attribute.                                                                       |
| `title()`         | Set the `title` attribute.                                                                       |

## Custom methods

Refer to the [Custom Methods Tests](https://github.com/php-forge/html/blob/main/tests/Layout/Header/CustomMethodTest.php)
for comprehensive examples.

The following methods are available for customizing the `HTML` output:

| Method    | Description                                                                                              |
| --------- | -------------------------------------------------------------------------------------------------------- |
| `begin() `| Start the `header` element.                                                                              |
| `end()`   | End the `header` element, and generate the `HTML` output.                                                |
| `render()`| Generates the `HTML` output.                                                                             |
| `widget()`| Instantiates the `Header::class`.                                                                        |
