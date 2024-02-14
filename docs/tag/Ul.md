# Ul

The `<ul>` `HTML` element represents an unordered list of items, typically rendered as a bulleted list.

## Basic Usage

Instantiate the `Ul` class using `Ul::widget()`.

```php
$ul = Ul::widget();
```

## Setting Attributes

Use the provided methods to set specific attributes for the a element.

```php
// setting class attribute
$ul->class('container');
```

Or, use the `attributes` method to set multiple attributes at once.

```php
$ul->attributes(['class' => 'container', 'style' => 'background-color: #eee;']);
```

## Adding Content

If you want to include content within the `div` tag, use the `content` method.

```php
$ul->content('MyContent');
```

## Rendering

Generate the `HTML` output using the `render` method, for simple instantiation. 

```php
$html = $ul->render();
```

Or, use the magic `__toString` method.

```php
$html = (string) $ul;
```

## Common Use Cases

Below are examples of common use cases:

```php
// adding multiple attributes
$ul->class('external')->content('MyContent');
```

Explore additional methods for setting various attributes such as `lang`, `name`, `style`, `title`, `type`, etc.

## Attributes

Refer to the [Attribute Tests](https://github.com/php-forge/html/blob/main/tests/Ul/AttributeTest.php) for comprehensive
examples.

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
| `type()`          | Set the `type` attribute.                                                                        |
|                   | Allowed values: 

## Custom methods

Refer to the [Custom Methods Tests](https://github.com/php-forge/html/blob/main/tests/Ul/CustomMethodTest.php) for
comprehensive examples.

The following methods are available for customizing the `HTML` output:

| Method    | Description                                                                                              |
| --------- | -------------------------------------------------------------------------------------------------------- |
| `render()`| Generates the `HTML` output.                                                                             |
| `widget()`| Instantiates the `Ul::class`.                                                                            |
