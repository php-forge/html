# Nav

The `<nav>` HTML element represents a section of a page whose purpose is to provide navigation links, either within the
current document or to other documents. Common examples of navigation sections are menus, tables of contents, and
indexes.

## Basic Usage

Instantiate the `Nav` class using `Nav::widget()`.

```php
$nav = Nav::widget();
```

Or, block style instantiation.

```php
<?= Nav::begin() ?>
    // ... content to be wrapped by `nav` element
<?= Nav::end() ?>
```

## Setting Attributes

Use the provided methods to set specific attributes for the a element.

```php
// setting class attribute
$nav->class('container');
```

Or, use the `attributes` method to set multiple attributes at once.

```php
$nav->attributes(['class' => 'container', 'style' => 'background-color: #eee;']);
```

## Adding Content

If you want to include content within the `nav` tag, use the `content` method.

```php
$nav->content('MyContent');
```

Or, use `begin()` and `end()` methods to wrap content.

```php
<?= Nav::begin() ?>
    My content
<?= Nav::end() ?>
```

## Rendering

Generate the `HTML` output using the `render` method, for simple instantiation. 

```php
$html = $nav->render();
```

For block style instantiation, use the `end()` method, which returns the `HTML` output.

```php
$html = Nav::end();
```

Or, use the magic `__toString` method.

```php
$html = (string) $nav;
```

## Common Use Cases

Below are examples of common use cases:

```php
// adding multiple attributes
$nav->class('external')->content('MyContent');

// using data attributes
$nav->dataAttributes(['analytics' => 'trackClick']);
```

Explore additional methods for setting various attributes such as `lang`, `name`, `style`, `title`, etc.

## Attributes

Refer to the [Attribute Tests](https://github.com/php-forge/html/blob/main/tests/Semantic/Nav/AttributeTest.php) for
comprehensive examples.

The following methods are available for setting attributes:

| Method            | Description                                                                                      |
| ----------------- | ------------------------------------------------------------------------------------------------ |
| `attributes()`    | Set multiple `attributes` at once.                                                               |
| `class()`         | Set the `class` attribute.                                                                       |
| `content()`       | Set the `content` within the `nav` element.                                                      |
| `dataAttributes()`| Set multiple `data-attributes` at once.                                                          |
| `id()`            | Set the `id` attribute.                                                                          |
| `lang()`          | Set the `lang` attribute.                                                                        |
| `name()`          | Set the `name` attribute.                                                                        |
| `style()`         | Set the `style` attribute.                                                                       |
| `title()`         | Set the `title` attribute.                                                                       |

## Custom methods

Refer to the [Custom Methods Tests](https://github.com/php-forge/html/blob/main/tests/Semantic/Nav/CustomMethodTest.php)
for comprehensive examples.

The following methods are available for customizing the `HTML` output:

| Method    | Description                                                                                              |
| --------- | -------------------------------------------------------------------------------------------------------- |
| `begin() `| Start the `nav` element.                                                                                 |
| `end()`   | End the `nav` element, and generate the `HTML` output.                                                   |
| `render()`| Generates the `HTML` output.                                                                             |
| `widget()`| Instantiates the `Nav::class`.                                                                           |
