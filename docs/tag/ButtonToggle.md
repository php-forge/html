# ButtonToggle

The `<button>` toggle is a custom tag representing a toggle button.

## Basic Usage

Instantiate the `buttonToggle` class using `ButtonToggle::widget()`.

```php
$buttonToggle = ButtonToggle::widget();
```

## Setting Attributes

Use the provided methods to set specific `attribute` for the `buttonToggle` element.

```php
// setting the title attribute
$buttonToggle->title('MyTitle');
```

Or, use the `attributes` method to set multiple `attributes` at once.

```php
$buttonToggle->attributes(['title' => 'MyTitle', 'class' => 'btn btn-primary']);
```

## Adding Content

If you want to include content within the `buttonToggle` tag, use the `content` method.

```php
$buttonToggle->content('MyContent');
```

## Rendering

Generate the `HTML` output using the `render` method.

```php
$html = $buttonToggle->render();
```

Or, use the magic `__toString` method.

```php
$html = (string) $button;
```

## Common Use Cases

Below are examples of common use cases:

```php
// adding multiple attributes
$buttonToggle->class('external')->content('MyContent')->title('MyTitle');

// using data attributes
$buttonToggle->dataAttributes(['bs-toggle' => 'modal', 'bs-target' => '#exampleModal', 'analytics' => 'trackClick']);
```

Explore additional methods for setting various `attributes` such as `ariaControls`, `tabIndex`, `role`, etc.

## Template

The `template` method allows you to customize the `HTML` output of the `button` element.

The following template tags are available:

| Tag        | Description             |
| ---------- | ----------------------- |
| `{toggle}` | The `button` element.   |
| `{icon}`   | The `icon` element.     |
| `{content}`| The `content` element.  |

```php
// using a custom template
$buttonToggle->template('<span>{toggle}</span>');
```

## Toggle examples:

- [Bootstrap5](https://github.com/php-forge/html/blob/main/tests/ButtonToggle/BootstrapTest.php)
- [Flowbite](https://github.com/php-forge/html/blob/main/tests/ButtonToggle/FlowbiteTest.php)

## Attributes

Refer to the [Attribute Tests](https://github.com/php-forge/html/blob/main/tests/ButtonToggle/AttributeTest.php) for
comprehensive examples.

The following methods are available for setting attributes:

| Method                | Description                                                                                  |
| --------------------- | -------------------------------------------------------------------------------------------- |
| `ariaControls()`      | Set the `aria-controls` attribute.                                                           |
| `ariaDescribedby()`   | Set the `aria-describedby` attribute.                                                        |
| `ariaExpanded()`      | Set the `aria-expanded` attribute.                                                           |
| `ariaLabel()`         | Set the `aria-label` attribute.                                                              |
| `attributes()`        | Set multiple `attributes` at once.                                                           |
| `class()`             | Set the `class` attribute.                                                                   |
| `content()`           | Set the `content` within the `button` element.                                               |
| `dataAttributes()`    | Set multiple `data-attributes` at once.                                                      |
| `dataBsAutoClose()`   | Set the `data-bs-auto-close` attribute.                                                      |
| `dataBsDismiss()`     | Set the `data-bs-dismiss` attribute.                                                         |
| `dataBsTarget()`      | Set the `data-bs-target` attribute.                                                          |
| `dataBsToggle()`      | Set the `data-bs-toggle` attribute.                                                          |
| `dataCollapseToggle()`| Set the `data-collapse-toggle` attribute.                                                    |
| `dataDismissTarget()` | Set the `data-dismiss-target` attribute.                                                     |
| `dataDrawerTarget()`  | Set the `data-drawer-target` attribute.                                                      |
| `dataDropdownToggle()`| Set the `data-dropdown-toggle` attribute.                                                    |
| `dataToggle()`        | Set the `data-toggle` attribute.                                                             |
| `id()`                | Set the `id` attribute.                                                                      |
| `name()`              | Set the `name` attribute.                                                                    |
| `role()`              | Set the `role` attribute.                                                                    |
| `style()`             | Set the `style` attribute.                                                                   |
| `tabindex()`          | Set the `tabindex` attribute.                                                                |
| `title()`             | Set the `title` attribute.                                                                   |

## Custom methods

Refer to the [Custom Methods Tests](https://github.com/php-forge/html/blob/main/tests/Body/CustomMethodTest.php) for
comprehensive examples.

The following methods are available for customizing the `HTML` output:

| Method                       | Description                                                                           |
| ---------------------------- | ------------------------------------------------------------------------------------- |
| `icon()`                     | Set enable or disable the `icon` element.                                             |
| `iconAttributes()`           | Set multiple `attributes` for the `icon` element.                                     |
| `iconClass()`                | Set the `class` attribute for the `icon` element.                                     |
| `iconContainer`              | Set Enable or disable the `icon-container` tag.                                       |
| `iconContainerAttributes()`  | Set multiple `attributes` for the `icon-container` tag.                               |
| `iconContainerClass()`       | Set the `class` attribute for the `icon-container` tag.                               |
| `iconContainerTag()`         | Set the `tag` for the `icon-container` tag.                                           |
| `iconContent()`              | Set the `content` for the `icon` element.                                             |
| `iconFilePath()`             | Set the `file path` for the `icon` element.                                           |
| `iconTag()`                  | Set the `tag` for the `icon` element.                                                 |
| `render()`                   | Generates the `HTML` output.                                                          |
| `template()`                 | Set the `template` for the `button-toggle` element.                                   |
| `toggle()`                   | Set enable or disable the `toggle`.                                                   |
| `toggleAttributes()`         | Set multiple `attributes` for the `toggle` element.                                   |
| `toggleClass()`              | Set the `class` attribute for the `toggle` element.                                   |
| `toggleContent()`            | Set the `content` for the `toggle` element.                                           |
| `toggleDataAttributes()`     | Set multiple `data-attributes` for the `toggle` element.                              |
| `toggleId()`                 | Set the `id` attribute for the `toggle` element.                                      |
| `togglePrefix()`             | Set the `prefix` for the `toggle` element.                                            |
| `toggleSuffix()`             | Set the `suffix` for the `toggle` element.                                            |
| `toggleTag()`                | Set the `tag` for the `toggle` element.                                               |
| `widget()`                   | Instantiates the `ButtonToggle::class`.                                               |
