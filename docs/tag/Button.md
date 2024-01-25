# Button

The `<button>` `HTML` element is an interactive element activated by a user with a mouse, keyboard, finger, voice 
command, or other assistive technology. Once activated, it then performs an action, such as submitting a form or
opening a dialog.

## Basic Usage

Instantiate the `Button` class using `Button::widget()`.

```php
$button = Button::widget();
```

## Setting Attributes

Use the provided methods to set specific attributes for the a element.

```php
// Example: Setting the title attribute
$button->title('Click me');
```

Or, use the `attributes` method to set multiple attributes at once.

```php
$button->attributes(['title' => 'Click me', 'class' => 'btn btn-primary']);
```

## Adding Content

If you want to include content within the `button` tag, use the `content` method.

```php
$button->content('Click me');
```

## Rendering

Generate the `HTML` output using the `render` method.

```php
$html = $button->render();
```

Or, use the magic `__toString` method.

```php
$html = (string) $button;
```

## Common Use Cases

Below are examples of common use cases:

```php
// Example: Adding multiple attributes
$button->class('external')->content('Click me')->title('Click me');

// Example: Using data attributes
$button->dataAttributes(['bs-toggle' => 'modal', 'bs-target' => '#exampleModal', 'analytics' => 'trackClick']);
```

Explore additional methods for setting various attributes such as `ariaControls`, `tabIndex`, `role`, etc.

Refer to the [Attribute Tests](https://github.com/php-forge/html/blob/main/tests/Button/AttributeTest.php) for comprehensive
examples.

## Container

Use the `container()` method to add a container around the `button` tag.

```php
// Example: Adding a container
$button->content('Click me')->container()->render();
```

## Prefix and Suffix

Use `prefix` and `suffix` methods to add text before and after the `button` tag, respectively.

```php
// Example: Adding a prefix
$button = $button->content('Home')->prefix('Go to: ')->render();

// Example: Adding a suffix
$button = $button->content('Home')->suffix(' | Welcome')->render();
```

Examples of `prefix` and `suffix` usage can be found in the [Custom Method Test](https://github.com/php-forge/html/blob/main/tests/Button/CustomMethodTest.php)
for comprehensive examples.

## Submit and reset

Use the `submit` and `reset` methods to set the `type` attribute to `submit` and `reset`, respectively.

```php
// Example: Setting the type attribute to submit
$button = $button->content('Submit')->submit()->render();
```

```php
// Example: Setting the type attribute to reset
$button = $button->content('Reset')->reset()->render();
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

Examples of `template` usage can be found in the [Custom Method Test](https://github.com/php-forge/html/blob/main/tests/Button/CustomMethodTest.php)
for comprehensive examples.

## Attributes

The following methods are available for setting attributes:

| Method             | Description                                                                                     |
| ------------------ | ------------------------------------------------------------------------------------------------|
| `ariaControls()`   | Sets the `aria-controls` attribute.                                                             |
| `ariaDescribedby()`| Sets the `aria-describedby` attribute.                                                          |
| `ariaDisabled()`   | Sets the `aria-disabled` attribute.                                                             |
| `ariaExpanded()`   | Sets the `aria-expanded` attribute.                                                             |
| `ariaLabel()`      | Sets the `aria-label` attribute.                                                                |
| `attributes()`     | Sets multiple attributes at once.                                                               |
| `autofocus()`      | Sets the `autofocus` attribute.                                                                 |
| `attributes()`     | Sets multiple attributes at once.                                                               |
| `class()`          | Sets the `class` attribute.                                                                     |
| `content()`        | Sets the content within the a element.                                                          |
| `dataAttributes()` | Sets multiple data attributes at once.                                                          |
| `id()`             | Sets the `id` attribute.                                                                        |
| `lang()`           | Sets the `lang` attribute.                                                                      |
| `name()`           | Sets the `name` attribute.                                                                      |
| `render()`         | Generates the `HTML` output.                                                                    |
| `role()`           | Sets the `role` attribute.                                                                      |
| `style()`          | Sets the `style` attribute.                                                                     |
| `tabindex()`       | Sets the `tabindex` attribute.                                                                  |
| `title()`          | Sets the `title` attribute.                                                                     |
| `type()`           | Sets the `type` attribute.                                                                      |
|                    | Allowed values: `button`, `submit`, `reset`.                                                    |

## Custom methods

The following methods are available for customizing the `HTML` output:

| Method                       | Description                                                                           |
| ---------------------------- | ------------------------------------------------------------------------------------- |
| `container()`                | Adds a container around the a element.                                                |
| `containerAttributes()`      | Sets attributes for the container.                                                    |
| `containerClass()`           | Sets the class attribute for the container.                                           |
| `containerTag()`             | Sets the tag for the container.                                                       |
| `prefix()`                   | Adds text before the a element.                                                       |
| `prefixContainer()`          | Adds a container before the a element.                                                |
| `prefixContainerAttributes()`| Sets attributes for the prefix container.                                             |
| `prefixContainerClass()`     | Sets the class attribute for the prefix container.                                    |
| `prefixContainerTag()`       | Sets the tag for the prefix container.                                                |
| `reset()`                    | Sets the type attribute to reset.                                                     |
| `submit()`                   | Sets the type attribute to submit.                                                    |
| `suffix()`                   | Adds text after the a element.                                                        |
| `suffixContainer()`          | Adds a container after the a element.                                                 |
| `suffixContainerAttributes()`| Sets attributes for the suffix container.                                             |
| `suffixContainerClass()`     | Sets the class attribute for the suffix container.                                    |
| `suffixContainerTag()`       | Sets the tag for the suffix container.                                                |
| `tagName()`                  | Sets the tag for the a element.                                                       |
|                              | Allowed values: `a`, `button`.                                                        |
| `template()`                 | Sets the template for the a element.                                                  |
| `type()`                     | Sets the type attribute.                                                              |
|                              | Allowed values: `button`, `submit`, `reset`.                                          |
