# A

The `<a>` `HTML` element (or anchor element), with its href attribute, creates a hyperlink to web pages, files, email
addresses, locations in the same page, or anything else a `URL` can address.

# Basic Usage

Instantiate the `A` class using `A::widget()`.

```php
$anchor = A::widget();
```

## Setting Attributes

Use the provided methods to set specific attributes for the a element.

```php
// Example: Setting href attribute
$anchor->href('/path/to/page');
```

Or, use the attributes method to set multiple attributes at once.

```php
$anchor->attributes(['href' => '/path/to/page']);
```

## Adding Content
If you want to include content within the anchor tag, use the content method.

```php
$anchor->content('Click me');
```

## Rendering
Generate the HTML output using the render method.

```php
$html = $anchor->render();
```

Or, use the magic `__toString` method.

```php
$html = (string) $anchor;
```

## Common Use Cases

Below are examples of common use cases:

```php
// Example: Adding multiple attributes
$anchor->class('external')->href('/external/link')->content('External Link');

// Example: Using data attributes
$anchor->dataAttributes(['target' => '_blank', 'analytics' => 'trackClick']);

// Example: Applying a custom template
$anchor->template('<span>{tag}</span>')->class('styled-link')->content('Styled Link');
```

Explore additional methods for setting various attributes such as `autofocus`, `hidden`, `download`, etc.
Refer to the [Attribute Tests](https://github.com/php-forge/html/blob/main/tests/A/AttributeTest.php) for comprehensive
examples.

## Prefix and Suffix

Use prefix and suffix methods to add text before and after the anchor tag, respectively.

```php
// Example: Adding a prefix
$html = $anchor->prefix('Go to: ')->render();

// Example: Adding a suffix
$html = $anchor->content('Home')->suffix(' | Welcome')->render();
```

Examples of prefix and suffix usage can be found in the [Custom Method Test](https://github.com/php-forge/html/blob/main/tests/A/CustomMethodTest.php)
for comprehensive examples.

# Template

The template method allows you to customize the `HTML` output of the a element. The following template tags are
available:

| Tag        | Description      |
| ---------- | ---------------- |
| `{prefix}` | The prefix text. |
| `{tag}`    | The a element.   |
| `{suffix}` | The suffix text. |

```php
// Example: Using a custom template
$a->template('<span>{tag}</span>')->class('styled-link')->content('Styled Link');
```

Examples of template usage can be found in the [Custom Method Test](https://github.com/php-forge/html/blob/main/tests/A/CustomMethodTest.php)
for comprehensive examples.
