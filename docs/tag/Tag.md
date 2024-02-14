# Tag

The `<tag>` `HTML` element represents a generic tag.
 
You must specify the tag name in the setter `tagName()`.

## Basic Usage

Instantiate the `Tag` class using `Tag::widget()`.

```php
$tag = Tag::widget()->tagName('div');
```

> Note: The `Tag` class is a generic class that can be used to create any `HTML` tag. You must specify the tag name
using the `tagName()` method.

## Setting Attributes

Use the provided methods to set specific attributes for the a element.

```php
// setting class attribute
$tag->class('container');
```

Or, use the `attributes` method to set multiple attributes at once.

```php
$tag->attributes(['class' => 'container', 'style' => 'background-color: #eee;']);
```

## Adding Content

If you want to include content within the `div` tag, use the `content` method.

```php
$tag->content('MyContent');
```

## Rendering

Generate the `HTML` output using the `render` method, for simple instantiation. 

```php
$html = $tag->render();
```

Or, use the magic `__toString` method.

```php
$html = (string) $tag;
```

## Common Use Cases

Below are examples of common use cases:

```php
// adding multiple attributes
$tag->class('external')->content('MyContent');

// using data attributes
$tag->dataAttributes(['analytics' => 'trackClick']);
```

Explore additional methods for setting various attributes such as `lang`, `name`, `style`, `title`, etc.

## Attributes

Refer to the [Attribute Tests](https://github.com/php-forge/html/blob/main/tests/Tag/AttributeTest.php) for 
comprehensive examples.

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
| `tabIndex()`      | Set the `tabindex` attribute.                                                                    |
| `title()`         | Set the `title` attribute.                                                                       |
| `type()`          | Set the `type` attribute.                                                                        |
| `value()`         | Set the `value` attribute.                                                                       |

## Custom methods

Refer to the [Custom Methods Tests](https://github.com/php-forge/html/blob/main/tests/Tag/CustomMethodTest.php) for
comprehensive examples.

The following methods are available for customizing the `HTML` output:

| Method         | Description                                                                                         |
| -------------- | --------------------------------------------------------------------------------------------------- |
| `render()`     | Generates the `HTML` output.                                                                        |
| `tagName()`    | Set the tag name for the `HTML` output.                                                             |
| `template()`   | Set the template for the `HTML` output.                                                             |
| `tokenValues()`| Set the token values for the `HTML` output.                                                         |
| `widget()`     | Instantiates the `Tag::class`.                                                                      |
