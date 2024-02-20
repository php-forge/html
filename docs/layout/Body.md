# Body

The `<body>` `HTML` element represents the content of an `HTML` document. 

There can be only one `<body>` element in a document.

## Basic Usage

Instantiate the `Body` class using `Body::widget()`.

```php
$body = Body::widget();
```

Or, block style instantiation.

```php
<?= Body::begin() ?>
    // ... content to be wrapped by `body` element
<?= Body::end() ?>
```

## Setting Attributes

Use the provided methods to set specific attributes for the a element.

```php
// setting class attribute
$body->class('container');
```

Or, use the `attributes` method to set multiple attributes at once.

```php
$body->attributes(['class' => 'container', 'style' => 'background-color: #eee;']);
```

## Adding Content

If you want to include content within the `body` tag, use the `content` method.

```php
$body->content('MyContent');
```

Or, use `begin()` and `end()` methods to wrap content.

```php
<?= Body::begin() ?>
    My content
<?= Body::end() ?>
```

## Rendering

Generate the `HTML` output using the `render` method, for simple instantiation. 

```php
$html = $body->render();
```

For block style instantiation, use the `end()` method, which returns the `HTML` output.

```php
$html = Body::end();
```

Or, use the magic `__toString` method.

```php
$html = (string) $body;
```

## Common Use Cases

Below are examples of common use cases:

```php
// adding multiple attributes
$body->class('external')->content('MyContent');

// using data attributes
$body->dataAttributes(['analytics' => 'trackClick']);
```

Explore additional methods for setting various attributes such as `lang`, `name`, `style`, `title`, etc.

## Attributes

Refer to the [Attribute Tests](https://github.com/php-forge/html/blob/main/tests/Body/AttributeTest.php) for comprehensive
examples.

The following methods are available for setting attributes:

| Method            | Description                                                                                      |
| ----------------- | ------------------------------------------------------------------------------------------------ |
| `attributes()`    | Set multiple `attributes` at once.                                                               |
| `class()`         | Set the `class` attribute.                                                                       |
| `content()`       | Set the `content` within the `body` element.                                                     |
| `dataAttributes()`| Set multiple `data-attributes` at once.                                                          |
| `id()`            | Set the `id` attribute.                                                                          |
| `lang()`          | Set the `lang` attribute.                                                                        |
| `name()`          | Set the `name` attribute.                                                                        |
| `style()`         | Set the `style` attribute.                                                                       |
| `title()`         | Set the `title` attribute.                                                                       |

## Custom methods

Refer to the [Custom Methods Tests](https://github.com/php-forge/html/blob/main/tests/Body/CustomMethodTest.php) for
comprehensive examples.

The following methods are available for customizing the `HTML` output:

| Method    | Description                                                                                              |
| --------- | -------------------------------------------------------------------------------------------------------- |
| `begin() `| Start the `body` element.                                                                                |
| `end()`   | End the `body` element, and generate the `HTML` output.                                                  |
| `render()`| Generates the `HTML` output.                                                                             |
| `widget()`| Instantiates the `Body::class`.                                                                          |
