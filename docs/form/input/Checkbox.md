# Checkbox

The input element with a type attribute whose value is `checkbox` represents a state or option that can be toggled.

## Basic Usage

Instantiate the `Checkbox` class using `Checkbox::widget()`.

```php
$checkbox = Checkbox::widget();
```

## Generate field id and name

The `generateField` method is used to generate the field id and name for the `HTML` output.

Allowed arguments are:

- `modelName` - The name of the model.
- `fieldName` - The name of the field.
- `arrayable` - Whether the field is an array. For default, it is `false`.

```php
// generate field id and name
$checkbox->generateField('model', 'field');
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

Refer to the [Attribute Tests](https://github.com/php-forge/html/blob/main/tests/Input/Checkbox/AttributeTest.php) for 
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
| `placeholder()`    | Set the `placeholder` attribute.                                                                |
| `readOnly()`       | Set the `readonly` attribute.                                                                   |
| `size()`           | Set the `size` attribute.                                                                       |
| `style()`          | Set the `style` attribute.                                                                      |
| `tabIndex()`       | Set the `tabindex` attribute.                                                                   |
| `title()`          | Set the `title` attribute.                                                                      |
| `value()`          | Set the `value` attribute.                                                                      |

## Custom methods

Refer to the [Custom Methods Tests](https://github.com/php-forge/html/blob/main/tests/Input/Checkbox/CustomMethodTest.php)
for comprehensive examples.

The following methods are available for customizing the `HTML` output:

| Method                       | Description                                                                           |
| ---------------------------- | ------------------------------------------------------------------------------------- |
| `container()`                | Set enabled or disabled for the `container` element.                                  |
| `containerAttributes()`      | Set `attributes` for the `container` element.                                         |
| `containerClass()`           | Set the `class` attribute for the `container` element.                                |
| `containerTag()`             | Set the `tag` for the `container` element.                                            |
| `enclosedByLabel()`          | Set enabled or disabled for the `enclosed-by-label` element.                          |
| `generateField()`            | Generate the field id and name for the `HTML` output.                                 |
| `prefix()`                   | Add text before the `textarea` element.                                               |
| `prefixContainer()`          | Set enabled or disabled for the `prefix-container` element.                           |
| `prefixContainerAttributes()`| Set `attributes` for the `prefix-container` element.                                  |                                            
| `prefixContainerClass()`     | Set the `class` attribute for the `prefix-container` element.                         |
| `prefixContainerTag()`       | Set the `tag` for the `prefix-container` element.                                     |
| `render()`                   | Generates the `HTML` output.                                                          |
| `separator()`                | Set the `separator` for the `HTML` output.                                            |
| `suffix()`                   | Add text after the `label` element.                                                   |
| `suffixContainer()`          | Set enabled or disabled for the `suffix-container` element.                           |
| `suffixContainerAttributes()`| Set `attributes` for the `suffix-container` element.                                  |
| `suffixContainerClass()`     | Set the `class` attribute for the `suffix-container` element.                         |
| `suffixContainerTag()`       | Set the `tag` for the `suffix-container` element.                                     |
| `template()`                 | Set the template for the `HTML` output.                                               |
| `uncheckAttributes()`        | Set the attributes for the hidden input tag.                                          |
| `uncheckClass()`             | Set the `class` attribute for the hidden input tag.                                   |
| `uncheckValue()`             | Set the `value` attribute for the hidden input tag.                                   |
| `widget()`                   | Instantiates the `Checkbox::class`.                                                   |

## Label methods

Refer to the [Label Tests](https://github.com/php-forge/html/blob/main/tests/Input/Checkbox/LabelTest.php) for
comprehensive examples.

The following methods are available for customizing the `HTML` output:

| Method             | Description                                                                                     |
| ------------------ | ----------------------------------------------------------------------------------------------- |
| `labelAttributes()`| Set `attributes` for the `label` element.                                                       |
| `labelClass()`     | Set the `class` attribute for the `label` element.                                              |
| `labelContent()`   | Set the `content` within the `label` element.                                                   |
| `labelFor()`       | Set the `for` attribute for the `label` element.                                                |
| `notLabel()`       | Set disabled for the `label` element.   

## Validate methods

Refer to the [Validate Tests](https://github.com/php-forge/html/blob/main/tests/Input/Checkbox/ValidateTest.php) for
comprehensive examples.

| Method         | Description                                                                                         |
| -------------- | --------------------------------------------------------------------------------------------------- |
| `required()`   | Set the `required` attribute.                                                                       |
