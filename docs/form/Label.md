# Label

The `<label>` `HTML` element represents a caption for an item in a user interface.

## Basic Usage

Instantiate the `Label` class using `Label::widget()`.

```php
$label = Label::widget();
```

## Setting Attributes

Use the provided methods to set specific attributes for the a element.

```php
// setting class attribute
$label->class('text-primary');
```

Or, use the `attributes` method to set multiple attributes at once.

```php
$label->attributes(['class' => 'text-primary', 'title' => 'Home']);
```

## Adding Content

If you want to include content within the `label` tag, use the `content` method.

```php
$label->content('Home');
```

## Rendering

Generate the `HTML` output using the `render` method.

```php
$html = $label->render();
```

Or, use the magic `__toString` method.

```php
$html = (string) $label;
```

## Common Use Cases

Below are examples of common use cases:

```php
// adding multiple attributes
$label->class('text-primary')->title('Home');

// using data attributes
$label->dataAttributes(['bs-toggle' => 'modal', 'bs-target' => '#exampleModal', 'analytics' => 'trackClick']);
```

Explore additional methods for setting various attributes such as `for`, `form`, `lang`, `tabindex`, `title`, and more.

## Prefix and Suffix

Use `prefix` and `suffix` methods to add text before and after the `label` tag, respectively.

```php
// adding a prefix
$html = $label->content('home')->prefix('Welcome')->render();

// adding a suffix
$html = $label->content('home')->suffix('Welcome')->render();
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
$label->template('<span>{tag}</span>');
```

## Attributes

Refer to the [Attribute Tests](https://github.com/php-forge/html/blob/main/tests/Label/AttributeTest.php) for
comprehensive examples.

The following methods are available for setting attributes:

| Method            | Description                                                                                      |
| ----------------- | ------------------------------------------------------------------------------------------------ |
| `attributes()`    | Set multiple `attributes` at once.                                                               |
| `class()`         | Set the `class` attribute.                                                                       |
| `content()`       | Set the `content` within the `label` element.                                                    |
| `dataAttributes()`| Set multiple `data-attributes` at once.                                                          |
| `for()`           | Set the `for` attribute.                                                                         |
| `form()`          | Set the `form` attribute.                                                                        |
| `id()`            | Set the `id` attribute.                                                                          |
| `lang()`          | Set the `lang` attribute.                                                                        |
| `name()`          | Set the `name` attribute.                                                                        |
| `style()`         | Set the `style` attribute.                                                                       |
| `title()`         | Set the `title` attribute.                                                                       |

## Custom methods

Refer to the [Custom Method Test](https://github.com/php-forge/html/blob/main/tests/Label/CustomMethodTest.php) for 
comprehensive examples.

The following methods are available for customizing the `HTML` output:

| Method                       | Description                                                                           |
| ---------------------------- | ------------------------------------------------------------------------------------- |
| `prefix()`                   | Add text before the `label` element.                                                  |
| `prefixContainer()`          | Set enabled or disabled for the `prefix-container` element.                           |
| `prefixContainerAttributes()`| Set `attributes` for the `prefix-container` element.                                  |                                            
| `prefixContainerClass()`     | Set the `class` attribute for the `prefix-container` element.                         |
| `prefixContainerTag()`       | Set the `tag` for the `prefix-container` element.                                     |
| `render()`                   | Generates the `HTML` output.                                                          |
| `suffix()`                   | Add text after the `label` element.                                                   |
| `suffixContainer()`          | Set enabled or disabled for the `suffix-container` element.                           |
| `suffixContainerAttributes()`| Set `attributes` for the `suffix-container` element.                                  |
| `suffixContainerClass()`     | Set the `class` attribute for the `suffix-container` element.                         |
| `suffixContainerTag()`       | Set the `tag` for the `suffix-container` element.                                     |
| `template()`                 | Set the `template` for the `label` element.                                           |
| `widget()`                   | Instantiates the `Label::class`.                                                      |
