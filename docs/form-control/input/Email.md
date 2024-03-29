# Email

The input element with a type attribute whose value is `email` represents a control for editing a list of e-mail 
addresses given in the element’s value.

## Basic Usage

Instantiate the `Email` class using `Email::widget()`.

```php
$email = Email::widget();
```

## Generate field id and name

The `generateField` method is used to generate the field id and name for the `HTML` output.

Allowed arguments are:

- `modelName` - The name of the model.
- `fieldName` - The name of the field.
- `arrayable` - Whether the field is an array. For default, it is `false`.

```php
// generate field id and name
$email->generateField('model', 'field');
```

## Setting Attributes

Use the provided methods to set specific attributes for the a element.

```php
// setting class attribute
$email->class('container');
```

Or, use the `attributes` method to set multiple attributes at once.

```php
$email->attributes(['class' => 'container', 'style' => 'background-color: #eee;']);
```

## Adding value

If you want to include value in the `email` element, use the `value` method.

```php
$email->value('MyValue');
```

## Rendering

Generate the `HTML` output using the `render` method, for simple instantiation. 

```php
$html = $email->render();
```

Or, use the magic `__toString` method.

```php
$html = (string) $email;
```

## Common use cases

Below are examples of common use cases:

```php
// adding multiple attributes
$email->class('external')->value('Myvalue');

// using data attributes
$email->dataAttributes(['analytics' => 'trackClick']);
```

Explore additional methods for setting various attributes such as `lang`, `multiple`, `name`, `size`, `style`, `title`,
etc.

## Prefix and Suffix

Use `prefix` and `suffix` methods to add text before and after the `email` tag, respectively.

```php
// adding a prefix
$html = $email->value('MyValue')->prefix('MyPrefix')->render();

// adding a suffix
$html = $email->value('MyValue')->suffix('MySuffix')->render();
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
$email->template('<div>{tag}</div>');
```

## Attributes

Refer to the [Attribute Tests](https://github.com/php-forge/html/blob/main/tests/FormControl/Input/Email/AttributeTest.php)
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
| `multiple()`       | Set the `multiple` attribute.                                                                   |
| `name()`           | Set the `name` attribute.                                                                       |
| `placeholder()`    | Set the `placeholder` attribute.                                                                |
| `readOnly()`       | Set the `readonly` attribute.                                                                   |
| `size()`           | Set the `size` attribute.                                                                       |
| `style()`          | Set the `style` attribute.                                                                      |
| `tabIndex()`       | Set the `tabindex` attribute.                                                                   |
| `title()`          | Set the `title` attribute.                                                                      |
| `value()`          | Set the `value` attribute.                                                                      |

## Custom methods

Refer to the [Custom Methods Tests](https://github.com/php-forge/html/blob/main/tests/FormControl/Input/Email/CustomMethodTest.php)
for comprehensive examples.

The following methods are available for customizing the `HTML` output:

| Method                       | Description                                                                           |
| ---------------------------- | ------------------------------------------------------------------------------------- |
| `generateField()`            | Generate the field id and name for the `HTML` output.                                 |
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
| `widget()`                   | Instantiates the `Email::class`.                                                      |

## Validate methods

Refer to the [Validate Tests](https://github.com/php-forge/html/blob/main/tests/FormControl/Input/Email/ValidateTest.php)
for comprehensive examples.

| Method         | Description                                                                                         |
| -------------- | --------------------------------------------------------------------------------------------------- |
| `maxLength()`  | Set the `maxlength` attribute.                                                                      |
| `minLength()`  | Set the `minlength` attribute.                                                                      |
| `pattern()`    | Set the `pattern` attribute.                                                                        |
| `required()`   | Set the `required` attribute.                                                                       |
