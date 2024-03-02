# Month

The input element with a type attribute whose value is `month` represents a control for setting the element’s value to a
string representing a month.

## Basic Usage

Instantiate the `Month` class using `Month::widget()`.

```php
$month = Month::widget();
```

## Generate field id and name

The `fieldAttributes` method is used to generate the field id and name for the `HTML` output.

Allowed arguments are:

- `formModel` - The name of the model.
- `property` - The name of the field.

```php
// generate field id and name
$month->fieldAttributes('model', 'field');
```

## Setting Attributes

Use the provided methods to set specific attributes for the a element.

```php
// setting class attribute
$month->class('container');
```

Or, use the `attributes` method to set multiple attributes at once.

```php
$month->attributes(['class' => 'container', 'style' => 'background-color: #eee;']);
```

## Adding value

If you want to include value in the `month` element, use the `value` method.

```php
$month->value('MyValue');
```

## Rendering

Generate the `HTML` output using the `render` method, for simple instantiation. 

```php
$html = $month->render();
```

Or, use the magic `__toString` method.

```php
$html = (string) $month;
```

## Common use cases

Below are examples of common use cases:

```php
// adding multiple attributes
$month->class('external')->value('Myvalue');

// using data attributes
$month->dataAttributes(['analytics' => 'trackClick']);
```

Explore additional methods for setting various attributes such as `lang`, `name`, `style`, `title`, etc.

## Prefix and Suffix

Use `prefix` and `suffix` methods to add text before and after the `month` tag, respectively.

```php
// adding a prefix
$html = $month->value('MyValue')->prefix('MyPrefix')->render();

// adding a suffix
$html = $month->value('MyValue')->suffix('MySuffix')->render();
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
$month->template('<div>{tag}</div>');
```

## Attributes

Refer to the [Attribute Tests](https://github.com/php-forge/html/blob/main/tests/FormControl/Input/Month/AttributeTest.php)
for comprehensive examples.

The following methods are available for setting attributes:

| Method             | Description                                                                                     |
| ------------------ | ----------------------------------------------------------------------------------------------- |
| `ariaDescribedBy()`| Set the `aria-describedby` attribute.                                                           |
| `ariaLabel()`      | Set the `aria-label` attribute.                                                                 |
| `attributes()`     | Set multiple `attributes` at once.                                                              |
| `autofocus()`      | Set the `autofocus` attribute.                                                                  |
| `class()`          | Set the `class` attribute.                                                                      |
| `dataAttributes()` | Set multiple `data-attributes` at once.                                                         |
| `disabled()`       | Set the `disabled` attribute.                                                                   |
| `form()`           | Set the `form` attribute.                                                                       |
| `hidden()`         | Set the `hidden` attribute.                                                                     |
| `id()`             | Set the `id` attribute.                                                                         |
| `lang()`           | Set the `lang` attribute.                                                                       |
| `name()`           | Set the `name` attribute.                                                                       |
| `readOnly()`       | Set the `readonly` attribute.                                                                   |
| `style()`          | Set the `style` attribute.                                                                      |
| `tabIndex()`       | Set the `tabindex` attribute.                                                                   |
| `title()`          | Set the `title` attribute.                                                                      |
| `value()`          | Set the `value` attribute.                                                                      |

## Custom methods

Refer to the [Custom Methods Tests](https://github.com/php-forge/html/blob/main/tests/FormControl/Input/Month/CustomMethodTest.php) 
for comprehensive examples.

The following methods are available for customizing the `HTML` output:

| Method                       | Description                                                                           |
| ---------------------------- | ------------------------------------------------------------------------------------- |
| `fieldAttributes()`          | Generate the field id and name for the `HTML` output.                                 |
| `prefix()`                   | Add text before the `textarea` element.                                               |
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
| `template()`                 | Set the template for the `HTML` output.                                               |
| `widget()`                   | Instantiates the `Month::class`.                                                      |

## Validate methods

Refer to the [Validate Tests](https://github.com/php-forge/html/blob/main/tests/FormControl/Input/Month/ValidateTest.php)
for comprehensive examples.

| Method      | Description                                                                                            |
| ----------- | ------------------------------------------------------------------------------------------------------ |
| `step()`    | Set the `step` attribute.                                                                              |
| `required()`| Set the `required` attribute.                                                                          |
