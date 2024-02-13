# Svg

The `<svg>` `HTML` element is a container that defines a new coordinate system and viewport.

It is used as the outermost element of SVG documents, but it can also be used to embed an SVG fragment inside an SVG
or HTML document.

## Basic Usage

Instantiate the `Svg` class using `Svg::widget()`.

```php
$svg = Svg::widget();
```

## Setting Attributes

Use the provided methods to set specific attributes for the a element.

```php
// setting class attribute
$svg->class('container');
```

Or, use the `attributes` method to set multiple attributes at once.

```php
$svg->attributes(['class' => 'container', 'style' => 'background-color: #eee;']);
```

## Adding Content

If you want to include content within the `svg` tag, use the `content` method.

```php
$svg->content('My content');
```

## Rendering

Generate the `HTML` output using the `render` method, for simple instantiation. 

```php
$html = $svg->render();
```

Or, use the magic `__toString` method.

```php
$html = (string) $svg;
```

## Common Use Cases

Below are examples of common use cases:

```php
// adding multiple attributes
$svg->class('external')->content('My content');

// setting the file path for the `HTML` output
$svg->filePath('/path/to/file')->render();
```

Explore additional methods for setting various attributes such as `fill`, `heigth`, `lang`, `name`, `style`, `title`,
`viewbox`, `width`, `xmlns`, etc.

## Attributes

Refer to the [Attribute Tests](https://github.com/php-forge/html/blob/main/tests/Svg/AttributeTest.php) for 
comprehensive examples.

The following methods are available for setting attributes:

| Method            | Description                                                                                      |
| ----------------- | ------------------------------------------------------------------------------------------------ |
| `attributes()`    | Set multiple `attributes` at once.                                                               |
| `class()`         | Set the `class` attribute.                                                                       |
| `content()`       | Set the `content` within the `svg` element.                                                      |
| `fill()`          | Set the `fill` attribute.                                                                        |
| `height()`        | Set the `height` attribute.                                                                      |
| `id()`            | Set the `id` attribute.                                                                          |
| `lang()`          | Set the `lang` attribute.                                                                        |
| `name()`          | Set the `name` attribute.                                                                        |
| `stroke()`        | Set the `stroke` attribute.                                                                      |
| `style()`         | Set the `style` attribute.                                                                       |
| `title()`         | Set the `title` attribute.                                                                       |
| `viewBox()`       | Set the `viewBox` attribute.                                                                     |
| `width()`         | Set the `width` attribute.                                                                       |
| `xmlns()`         | Set the `xmlns` attribute.                                                                       |

## Custom methods

Refer to the [Custom Methods Tests](https://github.com/php-forge/html/blob/main/tests/Svg/CustomMethodTest.php) for
comprehensive examples.

The following methods are available for customizing the `HTML` output:

| Method      | Description                                                                                            |
| ----------- | ------------------------------------------------------------------------------------------------------ |
| `filePath()`| Set the file path for the `HTML` output.                                                               |
| `render()`  | Generates the `HTML` output.                                                                           |
| `widget()`  | Instantiates the `Svg::class`.                                                                         |
