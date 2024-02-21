# Section

The `<section>` `HTML` element represents a generic standalone section of a document, which doesn't have a more specific
semantic element to represent it. Sections should always have a heading, with very few exceptions.

## Basic Usage

Instantiate the `Section` class using `Section::widget()`.

```php
$section = Section::widget();
```

Or, block style instantiation.

```php
<?= Section::begin() ?>
    // ... content to be wrapped by `section` element
<?= Section::end() ?>
```

## Setting Attributes

Use the provided methods to set specific attributes for the a element.

```php
// setting class attribute
$section->class('container');
```

Or, use the `attributes` method to set multiple attributes at once.

```php
$section->attributes(['class' => 'container', 'style' => 'background-color: #eee;']);
```

## Adding Content

If you want to include content within the `section` tag, use the `content` method.

```php
$section->content('MyContent');
```

Or, use `begin()` and `end()` methods to wrap content.

```php
<?= Section::begin() ?>
    My content
<?= Section::end() ?>
```

## Rendering

Generate the `HTML` output using the `render` method, for simple instantiation. 

```php
$html = $section->render();
```

For block style instantiation, use the `end()` method, which returns the `HTML` output.

```php
$html = Section::end();
```

Or, use the magic `__toString` method.

```php
$html = (string) $section;
```

## Common Use Cases

Below are examples of common use cases:

```php
// adding multiple attributes
$section->class('external')->content('MyContent');

// using data attributes
$section->dataAttributes(['analytics' => 'trackClick']);
```

Explore additional methods for setting various attributes such as `lang`, `name`, `style`, `title`, etc.

## Attributes

Refer to the [Attribute Tests](https://github.com/php-forge/html/blob/main/tests/Semantic/Section/AttributeTest.php) for
comprehensive examples.

The following methods are available for setting attributes:

| Method            | Description                                                                                      |
| ----------------- | ------------------------------------------------------------------------------------------------ |
| `attributes()`    | Set multiple `attributes` at once.                                                               |
| `class()`         | Set the `class` attribute.                                                                       |
| `content()`       | Set the `content` within the `section` element.                                                  |
| `dataAttributes()`| Set multiple `data-attributes` at once.                                                          |
| `id()`            | Set the `id` attribute.                                                                          |
| `lang()`          | Set the `lang` attribute.                                                                        |
| `name()`          | Set the `name` attribute.                                                                        |
| `style()`         | Set the `style` attribute.                                                                       |
| `title()`         | Set the `title` attribute.                                                                       |

## Custom methods

Refer to the [Custom Methods Tests](https://github.com/php-forge/html/blob/main/tests/Semantic/Section/CustomMethodTest.php)
for comprehensive examples.

The following methods are available for customizing the `HTML` output:

| Method    | Description                                                                                              |
| --------- | -------------------------------------------------------------------------------------------------------- |
| `begin() `| Start the `section` element.                                                                             |
| `end()`   | End the `section` element, and generate the `HTML` output.                                               |
| `render()`| Generates the `HTML` output.                                                                             |
| `widget()`| Instantiates the `Section::class`.                                                                       |
