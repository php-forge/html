# Main

The `<main>` `HTML` element represents the dominant content of the <body> of a document. The main content area consists
of content that is directly related to or expands upon the central topic of a document, or the central functionality of
an application.

## Basic Usage

Instantiate the `Main` class using `Main::widget()`.

```php
$main = Main::widget();
```

Or, block style instantiation.

```php
<?= Main::begin() ?>
    // ... content to be wrapped by `main` element
<?= Main::end() ?>
```

## Setting Attributes

Use the provided methods to set specific attributes for the a element.

```php
// setting class attribute
$main->class('container');
```

Or, use the `attributes` method to set multiple attributes at once.

```php
$main->attributes(['class' => 'container', 'style' => 'background-color: #eee;']);
```

## Adding Content

If you want to include content within the `main` tag, use the `content` method.

```php
$main->content('MyContent');
```

Or, use `begin()` and `end()` methods to wrap content.

```php
<?= Main::begin() ?>
    My content
<?= Main::end() ?>
```

## Rendering

Generate the `HTML` output using the `render` method, for simple instantiation. 

```php
$html = $main->render();
```

For block style instantiation, use the `end()` method, which returns the `HTML` output.

```php
$html = Main::end();
```

Or, use the magic `__toString` method.

```php
$html = (string) $main;
```

## Common Use Cases

Below are examples of common use cases:

```php
// adding multiple attributes
$main->class('external')->content('MyContent');

// using data attributes
$main->dataAttributes(['analytics' => 'trackClick']);
```

Explore additional methods for setting various attributes such as `lang`, `name`, `style`, `title`, etc.

## Attributes

Refer to the [Attribute Tests](https://github.com/php-forge/html/blob/main/tests/Layout/Main/AttributeTest.php) for
comprehensive examples.

The following methods are available for setting attributes:

| Method            | Description                                                                                      |
| ----------------- | ------------------------------------------------------------------------------------------------ |
| `attributes()`    | Set multiple `attributes` at once.                                                               |
| `class()`         | Set the `class` attribute.                                                                       |
| `content()`       | Set the `content` within the `main` element.                                                     |
| `dataAttributes()`| Set multiple `data-attributes` at once.                                                          |
| `id()`            | Set the `id` attribute.                                                                          |
| `lang()`          | Set the `lang` attribute.                                                                        |
| `name()`          | Set the `name` attribute.                                                                        |
| `style()`         | Set the `style` attribute.                                                                       |
| `title()`         | Set the `title` attribute.                                                                       |

## Custom methods

Refer to the [Custom Methods Tests](https://github.com/php-forge/html/blob/main/tests/Layout/Main/CustomMethodTest.php)
for comprehensive examples.

The following methods are available for customizing the `HTML` output:

| Method    | Description                                                                                              |
| --------- | -------------------------------------------------------------------------------------------------------- |
| `begin() `| Start the `main` element.                                                                                |
| `end()`   | End the `main` element, and generate the `HTML` output.                                                  |
| `render()`| Generates the `HTML` output.                                                                             |
| `widget()`| Instantiates the `Main::class`.                                                                          |
