# Footer

Represents a footer for its nearest ancestor sectioning content or sectioning root element.

A `footer` typically contains information about the author of the section, copyright data or links to related documents.

## Basic Usage

Instantiate the `Footer` class using `Footer::widget()`.

```php
$footer = Footer::widget();
```

Or, block style instantiation.

```php
<?= Footer::begin() ?>
    // ... content to be wrapped by `footer` element
<?= Footer::end() ?>
```

## Setting Attributes

Use the provided methods to set specific attributes for the a element.

```php
// setting class attribute
$footer->class('container');
```

Or, use the `attributes` method to set multiple attributes at once.

```php
$footer->attributes(['class' => 'container', 'style' => 'background-color: #eee;']);
```

## Adding Content

If you want to include content within the `footer` tag, use the `content` method.

```php
$footer->content('My content');
```

Or, use `begin()` and `end()` methods to wrap content.

```php
<?= Footer::begin() ?>
    My content
<?= Footer::end() ?>
```

## Rendering

Generate the `HTML` output using the `render` method, for simple instantiation. 

```php
$html = $footer->render();
```

For block style instantiation, use the `end()` method, which returns the `HTML` output.

```php
$html = Footer::end();
```

Or, use the magic `__toString` method.

```php
$html = (string) $footer;
```

## Common Use Cases

Below are examples of common use cases:

```php
// adding multiple attributes
$footer->class('external')->content('My content');

// using data attributes
$footer->dataAttributes(['analytics' => 'trackClick']);
```

Explore additional methods for setting various attributes such as `lang`, `name`, `style`, `title`, etc.

## Attributes

Refer to the [Attribute Tests](https://github.com/php-forge/html/blob/main/tests/Footer/AttributeTest.php) for
comprehensive examples.

The following methods are available for setting attributes:

| Method            | Description                                                                                      |
| ----------------- | ------------------------------------------------------------------------------------------------ |
| `attributes()`    | Set multiple `attributes` at once.                                                               |
| `class()`         | Set the `class` attribute.                                                                       |
| `content()`       | Set the `content` within the `footer` element.                                                   |
| `dataAttributes()`| Set multiple `data-attributes` at once.                                                          |
| `id()`            | Set the `id` attribute.                                                                          |
| `lang()`          | Set the `lang` attribute.                                                                        |
| `name()`          | Set the `name` attribute.                                                                        |
| `style()`         | Set the `style` attribute.                                                                       |
| `title()`         | Set the `title` attribute.                                                                       |

## Custom methods

Refer to the [Custom Methods Tests](https://github.com/php-forge/html/blob/main/tests/Footer/CustomMethodTest.php) for
comprehensive examples.

The following methods are available for customizing the `HTML` output:

| Method    | Description                                                                                              |
| --------- | -------------------------------------------------------------------------------------------------------- |
| `begin() `| Start the `footer` element.                                                                              |
| `end()`   | End the `footer` element, and generate the `HTML` output.                                                |
| `render()`| Generates the `HTML` output.                                                                             |
| `widget()`| Instantiates the `Footer::class`.                                                                        |
