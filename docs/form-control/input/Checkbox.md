# Checkbox

The input element with a type attribute whose value is `checkbox` represents a state or option that can be toggled.

## Basic Usage

Instantiate the `Checkbox` class using `Checkbox::widget()`.

```php
$checkbox = Checkbox::widget();
```

## Generate field id and name

The `fieldAttributes` method is used to generate the field id and name for the `HTML` output.

Allowed arguments are:

- `formModel` - The name of the model.
- `property` - The name of the field.

```php
// generate field id and name
$checkbox->fieldAttributes('formModel', 'field');
```

## Setting Attributes

Use the provided methods to set specific attributes for the a element.

```php
// setting class attribute
$checkbox->class('container');
```

Or, use the `attributes` method to set multiple attributes at once.

```php
$checkbox->attributes(['class' => 'container', 'style' => 'background-color: #eee;']);
```

## Adding value

If you want to include value in the `checkbox` element, use the `value` method.

```php
$checkbox->value('MyValue');
```

## Adding checked

if you want to include the `checked` attribute, use the `checked` method.

```php
$checkbox->checked(true);
```

Or add value for matching with the `checkbox` value attribute.

```php
$checkbox->checked('MyValue')->value('MyValue');
```

## Adding label

if you want to include a label, use the `labelContent` method.

```php
$checkbox->labelContent('MyLabel');
```

## Adding enclosed by label

if you want to include the `checkbox` enclosed by the `label` element, use the `enclosedByLabel` method.

```php
$checkbox->enclosedByLabel(true);
```

## Adding hidden input

if you want to include a hidden input, use the `uncheckValue` method.

```php
$checkbox->uncheckValue('MyValue');
```

## Rendering

Generate the `HTML` output using the `render` method, for simple instantiation. 

```php
$html = $checkbox->render();
```

Or, use the magic `__toString` method.

```php
$html = (string) $checkbox;
```

## Common use cases

Below are examples of common use cases:

```php
// adding multiple attributes
$checkbox->class('external')->value('Myvalue');

// using data attributes
$checkbox->dataAttributes(['analytics' => 'trackClick']);
```

Explore additional methods for setting various attributes such as `lang`, `name`, `style`, `title`, etc.

## Prefix and Suffix

Use `prefix` and `suffix` methods to add text before and after the `text` tag, respectively.

```php
// adding a prefix
$html = $checkbox->value('MyValue')->prefix('MyPrefix')->render();

// adding a suffix
$html = $checkbox->value('MyValue')->suffix('MySuffix')->render();
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
$checkbox->template('<div>{tag}</div>');
```

## Attributes

Refer to the [Attribute Tests](https://github.com/php-forge/html/blob/main/tests/FormControl/Input/Checkbox/AttributeTest.php) for 
comprehensive examples.

The following methods are available for setting attributes:

| Method             | Description                                                                                     |
| ------------------ | ----------------------------------------------------------------------------------------------- |
| `ariaDescribedBy()`| Set the `aria-describedby` attribute.                                                           |
| `ariaLabel()`      | Set the `aria-label` attribute.                                                                 |
| `attributes()`     | Set multiple `attributes` at once.                                                              |
| `autofocus()`      | Set the `autofocus` attribute.                                                                  |
| `checked()`        | Set the `checked` attribute.                                                                    |
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

Refer to the [Custom Methods Tests](https://github.com/php-forge/html/blob/main/tests/FormControl/Input/Checkbox/CustomMethodTest.php)
for comprehensive examples.

The following methods are available for customizing the `HTML` output:

| Method                       | Description                                                                           |
| ---------------------------- | ------------------------------------------------------------------------------------- |
| `container()`                | Set enabled or disabled for the `container` element.                                  |
| `containerAttributes()`      | Set `attributes` for the `container` element.                                         |
| `containerClass()`           | Set the `class` attribute for the `container` element.                                |
| `containerTag()`             | Set the `tag` for the `container` element.                                            |
| `fieldAttributes()`          | Generate the field id and name for the `HTML` output.                                 |
| `prefix()`                   | Add text before the `input` element. If empty, the `prefix` tag will be disabled.     |
| `prefixAttributes()`         | Set `attributes` for the `prefix` element.                                            |
| `prefixClass()`              | Set the `class` attribute for the `prefix` element.                                   |
| `prefixTag()`                | Set the `tag` for the `prefix` element.                                               |
|                              | If `false` the prefix tag will be disabled.                                           |
| `render()`                   | Generates the `HTML` output.                                                          |
| `separator()`                | Set the `separator` for the `HTML` output.                                            |
| `suffix()`                   | Add text after the `input` element. If empty, the `suffix` tag will be disabled.      |
| `suffixAttributes()`         | Set `attributes` for the `suffix` element.                                            |
| `suffixClass()`              | Set the `class` attribute for the `suffix` element.                                   |
| `suffixTag()`                | Set the `tag` for the `suffix-container` element.                                     |
|                              | If `false` the suffix tag will be disabled.                                           |
| `template()`                 | Set the template for the `HTML` output.                                               |
| `uncheckAttributes()`        | Set the attributes for the hidden input tag.                                          |
| `uncheckClass()`             | Set the `class` attribute for the hidden input tag.                                   |
| `uncheckValue()`             | Set the `value` attribute for the hidden input tag.                                   |
| `widget()`                   | Instantiates the `Checkbox::class`.                                                   |

## Label methods

Refer to the [Label Tests](https://github.com/php-forge/html/blob/main/tests/FormControl/Input/Checkbox/LabelTest.php)
for comprehensive examples.

The following methods are available for customizing the `HTML` output:

| Method             | Description                                                                                     |
| ------------------ | ----------------------------------------------------------------------------------------------- |
| `disableLabeñ()`   | Set disabled for the `label` element.                                                           |   
| `enclosedByLabel()`| Set enabled or disabled for the `enclosed-by-label` element.                                    |
| `labelAttributes()`| Set `attributes` for the `label` element.                                                       |
| `labelClass()`     | Set the `class` attribute for the `label` element.                                              |
| `labelContent()`   | Set the `content` within the `label` element.                                                   |
| `labelFor()`       | Set the `for` attribute for the `label` element.                                                |

## Validate methods

Refer to the [Validate Tests](https://github.com/php-forge/html/blob/main/tests/FormControl/Input/Checkbox/ValidateTest.php)
for comprehensive examples.

| Method         | Description                                                                                         |
| -------------- | --------------------------------------------------------------------------------------------------- |
| `required()`   | Set the `required` attribute.                                                                       |
