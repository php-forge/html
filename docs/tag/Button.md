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

Use the provided methods to set specific `attribute` for the `button` element.

```php
// setting the title attribute
$button->title('Click me');
```

Or, use the `attributes` method to set multiple `attributes` at once.

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
// adding multiple attributes
$button->class('external')->content('Click me')->title('Click me');

// using data attributes
$button->dataAttributes(['bs-toggle' => 'modal', 'bs-target' => '#exampleModal', 'analytics' => 'trackClick']);
```

Explore additional methods for setting various `attributes` such as `ariaControls`, `tabIndex`, `role`, etc.

## Container

Use the `container()` method to add a `container` around the `button` tag.

```php
// adding a container
$button->content('Click me')->container()->render();
```

## Prefix and Suffix

Use `prefix` and `suffix` methods to add text before and after the `button` tag, respectively.

```php
// adding a prefix
$button = $button->content('Home')->prefix('Go to: ')->render();

// adding a suffix
$button = $button->content('Home')->suffix(' | Welcome')->render();
```

## Submit and reset

Use the `submit` and `reset` methods to set the `type` attribute to `submit` and `reset`, respectively.

```php
// setting the type attribute to submit
$button = $button->content('Submit')->submit()->render();
```

```php
// setting the type attribute to reset
$button = $button->content('Reset')->reset()->render();
```

## Template

The `template` method allows you to customize the `HTML` output of the `button` element.

The following template tags are available:

| Tag        | Description             |
| ---------- | ----------------------- |
| `{prefix}` | The prefix text.        |
| `{tag}`    | The `button` element.   |
| `{suffix}` | The suffix text.        |

```php
// using a custom template
$button->template('<span>{tag}</span>');
```

## Attributes

Refer to the [Attribute Tests](https://github.com/php-forge/html/blob/main/tests/Button/AttributeTest.php) for comprehensive
examples.

The following methods are available for setting attributes:

| Method             | Description                                                                                     |
| ------------------ | ------------------------------------------------------------------------------------------------|
| `ariaControls()`   | Set the `aria-controls` attribute.                                                              |
| `ariaDescribedby()`| Set the `aria-describedby` attribute.                                                           |
| `ariaDisabled()`   | Set the `aria-disabled` attribute.                                                              |
| `ariaExpanded()`   | Set the `aria-expanded` attribute.                                                              |
| `ariaLabel()`      | Set the `aria-label` attribute.                                                                 |
| `attributes()`     | Set multiple `attributes` at once.                                                              |
| `autofocus()`      | Set the `autofocus` attribute.                                                                  |
| `class()`          | Set the `class` attribute.                                                                      |
| `content()`        | Set the `content` within the `button` element.                                                  |
| `dataAttributes()` | Set multiple `data-attributes` at once.                                                         |
| `id()`             | Set the `id` attribute.                                                                         |
| `lang()`           | Set the `lang` attribute.                                                                       |
| `name()`           | Set the `name` attribute.                                                                       |
| `role()`           | Set the `role` attribute.                                                                       |
| `style()`          | Set the `style` attribute.                                                                      |
| `tabindex()`       | Set the `tabindex` attribute.                                                                   |
| `title()`          | Set the `title` attribute.                                                                      |
| `type()`           | Set the `type` attribute.                                                                       |
|                    | Allowed values: `button`, `submit`, `reset`.                                                    |

## Custom methods

Refer to the [Custom Method Test](https://github.com/php-forge/html/blob/main/tests/Button/CustomMethodTest.php) for
comprehensive examples.

The following methods are available for customizing the `HTML` output:

| Method                       | Description                                                                           |
| ---------------------------- | ------------------------------------------------------------------------------------- |
| `container()`                | Set enabled or disabled for the `container` element.                                  |
| `containerAttributes()`      | Set `attributes` for the `container` element.                                         |
| `containerClass()`           | Set the `class` attribute for the `container` element.                                |
| `containerTag()`             | Set the `tag` for the `container` element.                                            |
| `prefix()`                   | Add text before the `button` element.                                                 |
| `prefixContainer()`          | Set enabled or disabled for the `prefix-container` element.                           |
| `prefixContainerAttributes()`| Set `attributes` for the `prefix-container` element.                                  |
| `prefixContainerClass()`     | Set the `class` attribute for the `prefix-container` element.                         |
| `prefixContainerTag()`       | Set the `tag` for the `prefix-container`.                                             |
| `render()`                   | Generates the `HTML` output.                                                          |
| `reset()`                    | Set the `type` attribute to `reset`.                                                  |
| `submit()`                   | Set the `type` attribute to `submit`.                                                 |
| `suffix()`                   | Add text after the `button` element.                                                  |
| `suffixContainer()`          | Set enabled or disabled for the `suffix-container` element.                           |
| `suffixContainerAttributes()`| Set `attributes` for the `suffix-container` element.                                  |
| `suffixContainerClass()`     | Set the `class` attribute for the `suffix-container` element.                         |
| `suffixContainerTag()`       | Set the `tag` for the `suffix-container` element.                                     |
| `tagName()`                  | Set the `tag` for the `button` element.                                               |
|                              | Allowed values: `a`, `button`.                                                        |
| `template()`                 | Set the `template` for the `button` element.                                          |
| `type()`                     | Set the `type` attribute.                                                             |
|                              | Allowed values: `button`, `submit`, `reset`.                                          |
| `widget()`                   | Instantiates the `Button::class`.                                                     |
