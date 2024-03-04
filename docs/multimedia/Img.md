# Img

The `<img>` `HTML` element embeds an image into the document.

## Basic Usage

Instantiate the `Img` class using `Img::widget()`.

```php
$img = Img::widget();
```

## Setting Attributes

Use the provided methods to set specific attributes for the a element.

```php
// setting class attribute
$img->class('external');
```

Or, use the `attributes` method to set multiple attributes at once.

```php
$img->attributes(['class' => 'external', 'title' => 'External Link']);
```

## Adding source

If you want to include an image, use the `src` method.

```php
$img->src('https://example.com/image.jpg');
```

## Rendering

Generate the `HTML` output using the `render` method.

```php
$html = $img->render();
```

Or, use the magic `__toString` method.

```php
$html = (string) $img;
```

## Common Use Cases

Below are examples of common use cases:

```php
// adding multiple attributes
$img->class('external')->title('External Link');

// using data attributes
$img->dataAttributes(['bs-toggle' => 'modal', 'bs-target' => '#exampleModal', 'analytics' => 'trackClick']);
```

Explore additional methods for setting various attributes such as `crossorigin`, `ismap`, `lang`, `loading`, `tabindex`,
`title`, and more.

## Prefix and Suffix

Use `prefix` and `suffix` methods to add text before and after the `img` tag, respectively.

```php
// adding a prefix
$html = $img->src('https://example.com/image.jpg')->prefix('prev')->render();

// adding a suffix
$html = $img->src('https://example.com/image.jpg')->suffix('Next')->render();
```

## Template

The `template` method allows you to customize the `HTML` output of the a element.

The following template tags are available:

| Tag        | Description      |
| ---------- | ---------------- |
| `{prefix}` | The prefix text. |
| `{tag}`    | The a element.   |
| `{suffix}` | The suffix text. |

```php
// using a custom template
$img->template('<span>{tag}</span>');
```

## Attributes

Refer to the [Attribute Tests](https://github.com/php-forge/html/blob/main/tests/Multimedia/Img/AttributeTest.php) for
comprehensive examples.

The following methods are available for setting attributes:

| Method            | Description                                                                                      |
| ----------------- | ------------------------------------------------------------------------------------------------ |
| `attributes()`    | Set multiple `attributes` at once.                                                               |
| `class()`         | Set the `class` attribute.                                                                       |
| `crossorigin()`   | Set the `crossorigin` attribute.                                                                 |
| `dataAttributes()`| Set multiple `data-attributes` at once.                                                          |
| `height()`        | Set the `height` attribute.                                                                      |
| `id()`            | Set the `id` attribute.                                                                          |
| `ismap()`         | Set the `ismap` attribute.                                                                       |
| `lang()`          | Set the `lang` attribute.                                                                        |
| `loading()`       | Set the `loading` attribute.                                                                     |
| `name()`          | Set the `name` attribute.                                                                        |
| `sizes()`         | Set the `sizes` attribute.                                                                       |
| `src()`           | Set the `src` attribute.                                                                         |
| `srcset()`        | Set the `srcset` attribute.                                                                      |
| `style()`         | Set the `style` attribute.                                                                       |
| `title()`         | Set the `title` attribute.                                                                       |
| `width()`         | Set the `width` attribute.                                                                       |

## Custom methods

Refer to the [Custom Method Test](https://github.com/php-forge/html/blob/main/tests/Multimedia/Img/CustomMethodTest.php)
for comprehensive examples.

The following methods are available for customizing the `HTML` output:

| Method                       | Description                                                                           |
| ---------------------------- | ------------------------------------------------------------------------------------- |
| `prefix()`                   | Add text before the `tag` element. If empty, the `prefix` tag will be disabled.       |
| `prefixAttributes()`         | Set `attributes` for the `prefix` element.                                            |
| `prefixClass()`              | Set the `class` attribute for the `prefix` element.                                   |
| `prefixTag()`                | Set the `tag` for the `prefix` element.                                               |
|                              | If `false` the prefix tag will be disabled.                                           |
| `render()`                   | Generates the `HTML` output.                                                          |
| `suffix()`                   | Add text after the `tag` element. If empty, the `suffix` tag will be disabled.        |
| `suffixAttributes()`         | Set `attributes` for the `suffix` element.                                            |
| `suffixClass()`              | Set the `class` attribute for the `suffix` element.                                   |
| `suffixTag()`                | Set the `tag` for the `suffix-container` element.                                     |
|                              | If `false` the suffix tag will be disabled.                                           |
| `template()`                 | Set the `template` for the `img` element.                                             |
| `widget()`                   | Instantiates the `Img::class`.                                                        |
