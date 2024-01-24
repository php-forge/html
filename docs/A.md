# A

The `<a>` `HTML` element (or anchor element), with its href attribute, creates a hyperlink to web pages, files, email
addresses, locations in the same page, or anything else a URL can address.

# Basic Usage

Instantiate the `A` class using `A::widget()`.

```php
$a = A::widget();
```

## Setting Attributes

Use the provided methods to set specific attributes for the a element.

```php
// Example: Setting href attribute
$a->href('/path/to/page');
```

Or, use the attributes method to set multiple attributes at once.

```php
$a->attributes(['href' => '/path/to/page']);
```

## Adding Content
If you want to include content within the anchor tag, use the content method.

```php
$a->content('Click me');
```

## Rendering
Generate the HTML output using the render method.

```php
$html = $a->render();
```

Or, use the magic `__toString` method.

```php
$html = (string) $a;
```

## Common Use Cases

Below are examples of common use cases:

```php
// Example: Adding multiple attributes
$a->class('external')->href('/external/link')->content('External Link');

// Example: Using data attributes
$a->dataAttributes(['target' => '_blank', 'analytics' => 'trackClick']);

// Example: Applying a custom template
$a->template('<span>{tag}</span>')->class('styled-link')->content('Styled Link');
```

## Advanced Features

Explore additional methods for setting various attributes such as autofocus, hidden, download, etc. Refer to the 
[Test Cases](https://github.com/php-forge/html/blob/main/tests/A/RenderTest.php) for comprehensive examples.

## Prefix and Suffix

Use prefix and suffix methods to add text before and after the anchor tag, respectively.

```php
// Example: Adding a prefix
$html = $a->prefix('Go to: ')->render();

// Example: Adding a suffix
$html = $a->content('Home')->suffix(' | Welcome')->render();
```

## Customization
Customize the appearance and behavior of the a element by chaining the appropriate methods.

```php
// Example: Customizing appearance
$a->class('custom-link')->style('color: red;')->content('Custom Link');
