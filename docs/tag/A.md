# A

The `<a>` `HTML` element (or `anchor` element), with its `href` attribute, creates a hyperlink to web pages, files,
email addresses, locations in the same page, or anything else a `URL` can address.

## Basic Usage

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

Or, use the `attributes` method to set multiple attributes at once.

```php
$anchor->attributes(['href' => '/path/to/page']);
```

## Adding Content

If you want to include content within the `anchor` tag, use the `content` method.

```php
$anchor->content('Click me');
```

## Rendering

Generate the `HTML` output using the `render` method.

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
$anchor->dataAttributes(['bs-toggle' => 'modal', 'bs-target' => '#exampleModal', 'analytics' => 'trackClick']);
```

Explore additional methods for setting various attributes such as `autofocus`, `hidden`, `download`, etc.

Refer to the [Attribute Tests](https://github.com/php-forge/html/blob/main/tests/A/AttributeTest.php) for comprehensive
examples.

## Prefix and Suffix

Use `prefix` and `suffix` methods to add text before and after the `anchor` tag, respectively.

```php
// Example: Adding a prefix
$html = $anchor->content('Home')->prefix('Go to: ')->render();

// Example: Adding a suffix
$html = $anchor->content('Home')->suffix(' | Welcome')->render();
```

Examples of `prefix` and `suffix` usage can be found in the [Custom Method Test](https://github.com/php-forge/html/blob/main/tests/A/CustomMethodTest.php)
for comprehensive examples.

## Template

The `template` method allows you to customize the `HTML` output of the a element.

The following template tags are available:

| Tag        | Description      |
| ---------- | ---------------- |
| `{prefix}` | The prefix text. |
| `{tag}`    | The a element.   |
| `{suffix}` | The suffix text. |

```php
// Example: Using a custom template
$a->template('<span>{tag}</span>');
```

Examples of `template` usage can be found in the [Custom Method Test](https://github.com/php-forge/html/blob/main/tests/A/CustomMethodTest.php)
for comprehensive examples.

## Attributes

The following methods are available for setting attributes:

| Method            | Description                                                                                      |
| ----------------- | ------------------------------------------------------------------------------------------------ |
| `ariaControls()`  | Sets the `aria-controls` attribute.                                                              |
| `ariaDisabled()`  | Sets the `aria-disabled` attribute.                                                              |
| `ariaExpanded()`  | Sets the `aria-expanded` attribute.                                                              |
| `ariaLabel()`     | Sets the `aria-label` attribute.                                                                 |
| `attributes()`    | Sets multiple attributes at once.                                                                |
| `autofocus()`     | Sets the `autofocus` attribute.                                                                  |
| `attributes()`    | Sets multiple attributes at once.                                                                |
| `class()`         | Sets the `class` attribute.                                                                      |
| `content()`       | Sets the content within the a element.                                                           |
| `dataAttributes()`| Sets multiple data attributes at once.                                                           |
| `download()`      | Sets the `download` attribute.                                                                   |
| `hidden()`        | Sets the `hidden` attribute.                                                                     |
| `href()`          | Sets the `href` attribute.                                                                       |
| `hreflang()`      | Sets the `hreflang` attribute.                                                                   |
| `id()`            | Sets the `id` attribute.                                                                         |
| `lang()`          | Sets the `lang` attribute.                                                                       |
| `name()`          | Sets the `name` attribute.                                                                       |
| `ping()`          | Sets the `ping` attribute.                                                                       |
| `referrerpolicy()`| Sets the `referrerpolicy` attribute.                                                             |
|                   | Allowed values: `no-referrer`, `no-referrer-when-downgrade`, `origin`, `origin-when-cross-origin`|
|                   | `same-origin`, `strict-origin`, `strict-origin-when-cross-origin`, `unsafe-url`                  |
| `rel()`           | Sets the `rel` attribute.                                                                        |
|                   | Allowed values: 'alternate', 'author', 'bookmark', 'help', 'icon', 'license', 'next', 'nofollow' |
|                   | 'noopener', 'noreferrer', 'pingback', 'preconnect', 'prefetch', 'preload', 'prerender', 'prev'   |
|                   | 'search', 'sidebar', 'stylesheet', 'tag'                                                         |
| `render()`        | Generates the `HTML` output.                                                                     |
| `role()`          | Sets the `role` attribute.                                                                       |
| `style()`         | Sets the `style` attribute.                                                                      |
| `target()`        | Sets the `target` attribute.                                                                     |
|                   | Allowed values: `_blank`, `_parent`, `_self`, `_top`                                             |
| `tabindex()`      | Sets the `tabindex` attribute.                                                                   |
| `title()`         | Sets the `title` attribute.                                                                      |
| `type()`          | Sets the `type` attribute.                                                                       |

## Custom methods

The following methods are available for customizing the `HTML` output:

| Method                       | Description                                                                           |
| ---------------------------- | ------------------------------------------------------------------------------------- |
| `prefix()`                   | Adds text before the a element.                                                       |
| `prefixContainer()`          | Adds a container before the a element.                                                |
| `prefixContainerAttributes()`| Sets attributes for the prefix container.                                             |
| `prefixContainerClass()`     | Sets the class attribute for the prefix container.                                    |
| `prefixContainerTag()`       | Sets the tag for the prefix container.                                                |
| `suffix()`                   | Adds text after the a element.                                                        |
| `suffixContainer()`          | Adds a container after the a element.                                                 |
| `suffixContainerAttributes()`| Sets attributes for the suffix container.                                             |
| `suffixContainerClass()`     | Sets the class attribute for the suffix container.                                    |
| `suffixContainerTag()`       | Sets the tag for the suffix container.                                                |
| `template()`                 | Sets the template for the a element.                                                  |
| `widget()`                   | Instantiates the A class.                                                             |
