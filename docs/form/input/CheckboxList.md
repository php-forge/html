# CheckboxList

Generates a list of checkbox buttons.

A checkbox is a graphical control element that allows the user to choose one or more options from a predefined set of
mutually exclusive options.

## Basic Usage

Instantiate the `CheckboxList` class using `CheckboxList::widget()`.

```php
$checkboxList = CheckboxList::widget();
```

## Generate field id and name

The `generateField` method is used to generate the field id and name for the `HTML` output.

Allowed arguments are:

- `modelName` - The name of the model.
- `fieldName` - The name of the field.
- `arrayable` - Whether the field is an array. For default, it is `false`.

```php
// generate field id and name
$checkboxList->generateField('model', 'field');
```

## Adding items

Use the `items` method to add items to the checkbox list.

```php
$checkboxList->items(
    Checkbox::widget()->labelContent('Apple')->value(1),
    Checkbox::widget()->labelContent('Banana')->value(2),
    Checkbox::widget()->labelContent('Orange')->value(3),
);
```

## Setting Attributes

Use the provided methods to set specific attributes for the a element.

```php
// setting class attribute
$checkboxList->class('container');
```

Or, use the `attributes` method to set multiple attributes at once.

```php
$checkboxList->attributes(['class' => 'container', 'style' => 'background-color: #eee;']);
```

## Adding checked

if you want to include the `checked` attribute, use the `checked` method.

```php
$checkboxList->checked(true);
```

Or add value for matching with the `checkbox` value attribute.

```php
$checkboxList->checked('MyValue')->value('MyValue');
```

For multiple checkboxes, use the `checked` method with the value to be checked.

```php
$checkboxList->checked([1, 3]);
```

## Adding label

if you want to include a label, use the `labelContent` method.

```php
$checkboxList->labelContent('MyLabel');
```

## Adding enclosed by label

if you want to include the `checkbox` enclosed by the `label` element, use the `enclosedByLabel` method.

```php
$checkboxList->enclosedByLabel(true);
```

## Adding hidden input

if you want to include a hidden input, use the `uncheckValue` method.

```php
$checkboxList->uncheckValue('MyValue');
```

## Rendering

Generate the `HTML` output using the `render` method, for simple instantiation. 

```php
$html = $checkboxList->render();
```

Or, use the magic `__toString` method.

```php
$html = (string) $checkboxList;
```

## Common use cases

Below are examples of common use cases:

```php
// adding multiple attributes
$checkboxList->class('external')->value('Myvalue');
```

Explore additional methods for setting various attributes such as `lang`, `name`, `style`, `title`, etc.

## Template

The `template` method allows you to customize the `HTML` output of the a element.

The following template tags are available:

| Tag       | Description        |
| --------- | ------------------ |
| `{label}` | The label element. |
| `{tag}`   | The a element.     |

```php
// using a custom template
$checkboxList->template('<div>{tag}</div>');
```

## Attributes

Refer to the [Attribute Tests](https://github.com/php-forge/html/blob/main/tests/Input/CheckboxList/AttributeTest.php)
for comprehensive examples.

The following methods are available for setting attributes:

| Method             | Description                                                                                     |
| ------------------ | ----------------------------------------------------------------------------------------------- |
| `ariaDescribedBy()`| Set the `aria-describedby` attribute.                                                           |
| `ariaLabel()`      | Set the `aria-label` attribute.                                                                 |
| `attributes()`     | Set multiple `attributes` at once.                                                              |
| `autofocus()`      | Set the `autofocus` attribute.                                                                  |
| `checked()`        | Set the `checked` attribute.                                                                    |
| `class()`          | Set the `class` attribute.                                                                      |
| `id()`             | Set the `id` attribute.                                                                         |
| `name()`           | Set the `name` attribute.                                                                       |
| `style()`          | Set the `style` attribute.                                                                      |
| `tabIndex()`       | Set the `tabindex` attribute.                                                                   |

## Custom methods

Refer to the [Custom Methods Tests](https://github.com/php-forge/html/blob/main/tests/Input/CheckboxList/CustomMethodTest.php)
for comprehensive examples.

The following methods are available for customizing the `HTML` output:

| Method                 | Description                                                                                 |
| ---------------------- | ------------------------------------------------------------------------------------------- |
| `container()`          | Set enabled or disabled for the `container` element.                                        |
| `containerAttributes()`| Set `attributes` for the `container` element.                                               |
| `containerClass()`     | Set the `class` attribute for the `container` element.                                      |
| `containerTag()`       | Set the `tag` for the `container` element.                                                  |
| `generateField()`      | Generate the field id and name for the `HTML` output.                                       |
| `items()`              | Set the `items` for the `HTML` output.                                                      |
| `render()`             | Generates the `HTML` output.                                                                |
| `separator()`          | Set the `separator` for the `HTML` output.                                                  |
| `template()`           | Set the template for the `HTML` output.                                                     |
| `uncheckAttributes()`  | Set the attributes for the hidden input tag.                                                |
| `uncheckClass()`       | Set the `class` attribute for the hidden input tag.                                         |
| `uncheckValue()`       | Set the `value` attribute for the hidden input tag.                                         |
| `widget()`             | Instantiates the `CheckboxList::class`.                                                     |

## Label methods

Refer to the [Label Tests](https://github.com/php-forge/html/blob/main/tests/Input/CheckboxList/LabelTest.php) for
comprehensive examples.

The following methods are available for customizing the `HTML` output:

| Method             | Description                                                                                     |
| ------------------ | ----------------------------------------------------------------------------------------------- |
| `enclosedByLabel()`| Set enabled or disabled for the `enclosed-by-label` element.                                    |
| `labelAttributes()`| Set `attributes` for the `label` element.                                                       |
| `labelClass()`     | Set the `class` attribute for the `label` element.                                              |
| `labelContent()`   | Set the `content` within the `label` element.                                                   |
| `labelFor()`       | Set the `for` attribute for the `label` element.                                                |
| `notLabel()`       | Set disabled for the `label` element.   

## Validate methods

Refer to the [Validate Tests](https://github.com/php-forge/html/blob/main/tests/Input/CheckboxList/ValidateTest.php) for
comprehensive examples.

| Method         | Description                                                                                         |
| -------------- | --------------------------------------------------------------------------------------------------- |
| `required()`   | Set the `required` attribute.                                                                       |
