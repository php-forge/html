# I

The `<i>` `HTML` element represents a range of text that's set off from the normal text for some reason, such as an
idiomatic text, technical terms, taxonomic designations, among others.

## Basic Usage

Instantiate the `I` class using `I::widget()`.

```php
$i = I::widget();
```

## Setting Attributes

Use the provided methods to set specific attributes for the a element.

```php
// setting class attribute
$i->class('fa fa-home');
```

Or, use the `attributes` method to set multiple attributes at once.

```php
$i->attributes(['class' => 'fa fa-home', 'aria-hidden' => 'true']);
```

## Adding Content

If you want to include content within the `i` tag, use the `content` method.

```php
$i->content('->');
```

## Rendering

Generate the `HTML` output using the `render` method.

```php
$html = $i->render();
```

Or, use the magic `__toString` method.

```php
$html = (string) $i;
```

## Common Use Cases

Below are examples of common use cases:

```php
// adding multiple attributes
$i->class('fa fa-home')->title('Home');

// using data attributes
$i->dataAttributes(['bs-toggle' => 'modal', 'bs-target' => '#exampleModal', 'analytics' => 'trackClick']);
```

Explore additional methods for setting various attributes such as `lang`, `tabindex`, `title`, and more.

## Prefix and Suffix

Use `prefix` and `suffix` methods to add text before and after the `i` tag, respectively.

```php
// adding a prefix
$html = $i->content('->')->prefix('Next')->render();

// adding a suffix
$html = $i->content('<-')->suffix('Previous')->render();
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
$i->template('<span>{tag}</span>');
```

## Attributes

Refer to the [Attribute Tests](https://github.com/php-forge/html/blob/main/tests/Textual/I/AttributeTest.php) for
comprehensive examples.

The following methods are available for setting attributes:

| Method            | Description                                                                                      |
| ----------------- | ------------------------------------------------------------------------------------------------ |
| `attributes()`    | Set multiple `attributes` at once.                                                               |
| `class()`         | Set the `class` attribute.                                                                       |
| `content()`       | Set the `content` within the `i` element.                                                        |
| `dataAttributes()`| Set multiple `data-attributes` at once.                                                          |
| `id()`            | Set the `id` attribute.                                                                          |
| `lang()`          | Set the `lang` attribute.                                                                        |
| `name()`          | Set the `name` attribute.                                                                        |
| `style()`         | Set the `style` attribute.                                                                       |
| `title()`         | Set the `title` attribute.                                                                       |

## Custom methods

Refer to the [Custom Method Test](https://github.com/php-forge/html/blob/main/tests/Textual/I/CustomMethodTest.php) for 
comprehensive examples.

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
| `template()`                 | Set the `template` for the `i` element.                                               |
| `widget()`                   | Instantiates the `I::class`.                                                          |
