# P

The `<p>` `HTML` element represents a paragraph. Paragraphs are usually represented in visual media as blocks of text
separated from adjacent blocks by blank lines and/or first-line indentation, but HTML paragraphs can be any structural
grouping of related content, such as images or form fields.

## Basic Usage

Instantiate the `P` class using `P::widget()`.

```php
$p = P::widget();
```

Or, block style instantiation.

```php
<?= P::begin() ?>
    // ... content to be wrapped by `p` element
<?= P::end() ?>
```

## Setting Attributes

Use the provided methods to set specific attributes for the a element.

```php
// setting class attribute
$p->class('container');
```

Or, use the `attributes` method to set multiple attributes at once.

```php
$p->attributes(['class' => 'container', 'style' => 'background-color: #eee;']);
```

## Adding Content

If you want to include content within the `p` tag, use the `content` method.

```php
$p->content('My content');
```

Or, use `begin()` and `end()` methods to wrap content.

```php
<?= P::begin() ?>
    My content
<?= P::end() ?>
```

## Rendering

Generate the `HTML` output using the `render` method, for simple instantiation. 

```php
$html = $p->render();
```

For block style instantiation, use the `end()` method, which returns the `HTML` output.

```php
$html = P::end();
```

Or, use the magic `__toString` method.

```php
$html = (string) $p;
```

## Common Use Cases

Below are examples of common use cases:

```php
// adding multiple attributes
$p->class('external')->content('My content');

// using data attributes
$p->dataAttributes(['analytics' => 'trackClick']);
```

Explore additional methods for setting various attributes such as `lang`, `name`, `style`, `title`, etc.

## Attributes

Refer to the [Attribute Tests](https://github.com/php-forge/html/blob/main/tests/P/AttributeTest.php) for comprehensive
examples.

The following methods are available for setting attributes:

| Method            | Description                                                                                      |
| ----------------- | ------------------------------------------------------------------------------------------------ |
| `attributes()`    | Set multiple `attributes` at once.                                                               |
| `class()`         | Set the `class` attribute.                                                                       |
| `content()`       | Set the `content` within the `p` element.                                                        |
| `dataAttributes()`| Set multiple `data-attributes` at once.                                                          |
| `id()`            | Set the `id` attribute.                                                                          |
| `lang()`          | Set the `lang` attribute.                                                                        |
| `name()`          | Set the `name` attribute.                                                                        |
| `style()`         | Set the `style` attribute.                                                                       |
| `title()`         | Set the `title` attribute.                                                                       |

## Custom methods

Refer to the [Custom Methods Tests](https://github.com/php-forge/html/blob/main/tests/P/CustomMethodTest.php) for
comprehensive examples.

The following methods are available for customizing the `HTML` output:

| Method    | Description                                                                                              |
| --------- | -------------------------------------------------------------------------------------------------------- |
| `begin() `| Start the `p` element.                                                                                   |
| `end()`   | End the `p` element, and generate the `HTML` output.                                                     |
| `render()`| Generates the `HTML` output.                                                                             |
| `widget()`| Instantiates the `Body::class`.                                                                          |
