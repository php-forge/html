# Head

The `<head>` `HTML` element contains machine-readable information (metadata) about the document, like its title,
scripts, and style sheets.

## Basic Usage

Instantiate the `Head` class using `Head::widget()`.

```php
$head = Head::widget();
```

Or, block style instantiation.

```php
<?= Head::begin() ?>
    // ... content to be wrapped by `head` element
<?= Head::end() ?>
```

## Setting Attributes

Use the provided methods to set specific attributes for the a element.

```php
// setting class attribute
$head->class('container');
```

Or, use the `attributes` method to set multiple attributes at once.

```php
$head->attributes(['class' => 'container', 'style' => 'background-color: #eee;']);
```

## Adding Content

If you want to include content within the `head` tag, use the `content` method.

```php
$head->content('MyContent');
```

Or, use `begin()` and `end()` methods to wrap content.

```php
<?= Head::begin() ?>
    My content
<?= Head::end() ?>
```

## Rendering

Generate the `HTML` output using the `render` method, for simple instantiation. 

```php
$html = $head->render();
```

For block style instantiation, use the `end()` method, which returns the `HTML` output.

```php
$html = Head::end();
```

Or, use the magic `__toString` method.

```php
$html = (string) $head;
```

## Common Use Cases

Below are examples of common use cases:

```php
// adding multiple attributes
$head->class('external')->content('MyContent');

// using data attributes
$head->dataAttributes(['analytics' => 'trackClick']);
```

Explore additional methods for setting various attributes such as `lang`, `name`, `style`, `title`, etc.

## Attributes

Refer to the [Attribute Tests](https://github.com/php-forge/html/blob/main/tests/Head/AttributeTest.php) for
comprehensive examples.

The following methods are available for setting attributes:

| Method            | Description                                                                                      |
| ----------------- | ------------------------------------------------------------------------------------------------ |
| `attributes()`    | Set multiple `attributes` at once.                                                               |
| `class()`         | Set the `class` attribute.                                                                       |
| `content()`       | Set the `content` within the `head` element.                                                     |
| `dataAttributes()`| Set multiple `data-attributes` at once.                                                          |
| `id()`            | Set the `id` attribute.                                                                          |
| `lang()`          | Set the `lang` attribute.                                                                        |
| `name()`          | Set the `name` attribute.                                                                        |
| `style()`         | Set the `style` attribute.                                                                       |
| `title()`         | Set the `title` attribute.                                                                       |

## Custom methods

Refer to the [Custom Methods Tests](https://github.com/php-forge/html/blob/main/tests/Head/CustomMethodTest.php) for
comprehensive examples.

The following methods are available for customizing the `HTML` output:

| Method    | Description                                                                                              |
| --------- | -------------------------------------------------------------------------------------------------------- |
| `begin() `| Start the `head` element.                                                                                |
| `end()`   | End the `head` element, and generate the `HTML` output.                                                  |
| `render()`| Generates the `HTML` output.                                                                             |
| `widget()`| Instantiates the `Head::class`.                                                                          |
