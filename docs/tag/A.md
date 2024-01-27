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

## Prefix and Suffix

Use `prefix` and `suffix` methods to add text before and after the `anchor` tag, respectively.

```php
// Example: Adding a prefix
$html = $anchor->content('Home')->prefix('Go to: ')->render();

// Example: Adding a suffix
$html = $anchor->content('Home')->suffix(' | Welcome')->render();
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
// Example: Using a custom template
$a->template('<span>{tag}</span>');
```

## Attributes

Refer to the [Attribute Tests](https://github.com/php-forge/html/blob/main/tests/A/AttributeTest.php) for comprehensive
examples.

The following methods are available for setting attributes:

| Method            | Description                                                                                      |
| ----------------- | ------------------------------------------------------------------------------------------------ |
| `ariaControls()`  | Set the `aria-controls` attribute.                                                               |
| `ariaDisabled()`  | Set the `aria-disabled` attribute.                                                               |
| `ariaExpanded()`  | Set the `aria-expanded` attribute.                                                               |
| `ariaLabel()`     | Set the `aria-label` attribute.                                                                  |
| `attributes()`    | Set multiple `attributes` at once.                                                               |
| `autofocus()`     | Set the `autofocus` attribute.                                                                   |
| `class()`         | Set the `class` attribute.                                                                       |
| `content()`       | Set the `content` within the `a` element.                                                        |
| `dataAttributes()`| Set multiple `data-attributes` at once.                                                          |
| `download()`      | Set the `download` attribute.                                                                   |
| `hidden()`        | Set the `hidden` attribute.                                                                     |
| `href()`          | Set the `href` attribute.                                                                       |
| `hreflang()`      | Set the `hreflang` attribute.                                                                   |
| `id()`            | Set the `id` attribute.                                                                         |
| `lang()`          | Set the `lang` attribute.                                                                       |
| `name()`          | Set the `name` attribute.                                                                       |
| `ping()`          | Set the `ping` attribute.                                                                       |
| `referrerpolicy()`| Set the `referrerpolicy` attribute.                                                             |
|                   | Allowed values: `no-referrer`, `no-referrer-when-downgrade`, `origin`, `origin-when-cross-origin`|
|                   | `same-origin`, `strict-origin`, `strict-origin-when-cross-origin`, `unsafe-url`                  |
| `rel()`           | Set the `rel` attribute.                                                                         |
|                   | Allowed values: 'alternate', 'author', 'bookmark', 'help', 'icon', 'license', 'next', 'nofollow' |
|                   | 'noopener', 'noreferrer', 'pingback', 'preconnect', 'prefetch', 'preload', 'prerender', 'prev'   |
|                   | 'search', 'sidebar', 'stylesheet', 'tag'                                                         |
| `role()`          | Set the `role` attribute.                                                                        |
| `style()`         | Set the `style` attribute.                                                                       |
| `target()`        | Set the `target` attribute.                                                                      |
|                   | Allowed values: `_blank`, `_parent`, `_self`, `_top`                                             |
| `tabindex()`      | Set the `tabindex` attribute.                                                                    |
| `title()`         | Set the `title` attribute.                                                                       |
| `type()`          | Set the `type` attribute.                                                                        |

## Custom methods

Refer to the [Custom Method Test](https://github.com/php-forge/html/blob/main/tests/A/CustomMethodTest.php) for
comprehensive examples.

The following methods are available for customizing the `HTML` output:

| Method                       | Description                                                                           |
| ---------------------------- | ------------------------------------------------------------------------------------- |
| `prefix()`                   | Add text before the `a` element.                                                      |
| `prefixContainer()`          | Set enabled or disabled for the `prefix-container` element.                           |
| `prefixContainerAttributes()`| Set `attributes` for the `prefix-container` element.                                  |                                            
| `prefixContainerClass()`     | Set the `class` attribute for the `prefix-container` element.                         |
| `prefixContainerTag()`       | Set the `tag` for the `prefix-container` element.                                     |
| `render()`                   | Generates the `HTML` output.                                                          |
| `suffix()`                   | Add text after the `a` element.                                                       |
| `suffixContainer()`          | Set enabled or disabled for the `suffix-container` element.                           |
| `suffixContainerAttributes()`| Set `attributes` for the `suffix-container` element.                                  |
| `suffixContainerClass()`     | Set the `class` attribute for the `suffix-container` element.                         |
| `suffixContainerTag()`       | Set the `tag` for the `suffix-container` element.                                     |
| `template()`                 | Set the `template` for the `a` element.                                               |
| `widget()`                   | Instantiates the `A::class`.                                                          |
