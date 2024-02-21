# H

The `<h1>` to `<h6>` `HTML` elements represent six levels of section headings.

`<h1>` is the highest section level and `<h6>` is the lowest.

## Basic Usage

Instantiate the `H` class using `H::widget()`.

```php
$h = H::widget();
```

Or, block style instantiation.

```php
<?= H::begin() ?>
    // ... content to be wrapped by `h` element
<?= H::end() ?>
```

## Setting Attributes

Use the provided methods to set specific attributes for the a element.

```php
// setting class attribute
$h->class('container');
```

Or, use the `attributes` method to set multiple attributes at once.

```php
$h->attributes(['class' => 'container', 'style' => 'background-color: #eee;']);
```

## Adding Content

If you want to include content within the `h` tag, use the `content` method.

```php
$h->content('MyContent');
```

Or, use `begin()` and `end()` methods to wrap content.

```php
<?= H::begin() ?>
    My content
<?= H::end() ?>
```

## Rendering

Generate the `HTML` output using the `render` method, for simple instantiation. 

```php
$html = $h->render();
```

For block style instantiation, use the `end()` method, which returns the `HTML` output.

```php
$html = H::end();
```

Or, use the magic `__toString` method.

```php
$html = (string) $h;
```

## Common Use Cases

Below are examples of common use cases:

```php
// adding multiple attributes
$h->class('external')->content('MyContent');

// using data attributes
$h->dataAttributes(['analytics' => 'trackClick']);

// specifying the tag name h2
H::widget()->tagName('h2')->content('MyContent')->render()
```

Explore additional methods for setting various attributes such as `lang`, `name`, `style`, `title`, etc.

## Attributes

Refer to the [Attribute Tests](https://github.com/php-forge/html/blob/main/tests/Semantic/H/AttributeTest.php) for
comprehensive examples.

The following methods are available for setting attributes:

| Method            | Description                                                                                      |
| ----------------- | ------------------------------------------------------------------------------------------------ |
| `attributes()`    | Set multiple `attributes` at once.                                                               |
| `class()`         | Set the `class` attribute.                                                                       |
| `content()`       | Set the `content` within the `h` element.                                                        |
| `dataAttributes()`| Set multiple `data-attributes` at once.                                                          |
| `id()`            | Set the `id` attribute.                                                                          |
| `lang()`          | Set the `lang` attribute.                                                                        |
| `name()`          | Set the `name` attribute.                                                                        |
| `style()`         | Set the `style` attribute.                                                                       |
| `title()`         | Set the `title` attribute.                                                                       |

## Custom methods

Refer to the [Custom Methods Tests](https://github.com/php-forge/html/blob/main/tests/Semantic/H/CustomMethodTest.php)
for comprehensive examples.

The following methods are available for customizing the `HTML` output:

| Method     | Description                                                                                             |
| ---------- | ------------------------------------------------------------------------------------------------------- |
| `begin()  `| Start the `h` element.                                                                                  |
| `end()`    | End the `h` element, and generate the `HTML` output.                                                    |
| `render()` | Generates the `HTML` output.                                                                            |
| `tagName()`| Set the `tag` name.                                                                                     |
|            | Alowed values: `h1`, `h2`, `h3`, `h4`, `h5`, `h6`. For default value its `h1`.                          |
| `widget()` | Instantiates the `H::class`.                                                                            |
