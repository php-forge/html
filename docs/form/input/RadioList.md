# RadioList

Generates a list of radio buttons.

A radio button is a graphical control element that allows the user to choose only one of a predefined set of mutually
exclusive options.

## Basic Usage

Instantiate the `RadioList` class using `RadioList::widget()`.

```php
$radioList = RadioList::widget();
```

## Generate field id and name

The `generateField` method is used to generate the field id and name for the `HTML` output.

Allowed arguments are:

- `modelName` - The name of the model.
- `fieldName` - The name of the field.
- `arrayable` - Whether the field is an array. For default, it is `false`.

```php
// generate field id and name
$radioList->generateField('model', 'field');
```

## Adding items

Use the `items` method to add items to the radio list.

```php
$radioList->items(
    Radio::widget()->labelContent('Female')->value('1'),
    Radio::widget()->labelContent('Male')->value('2'),
);
```

## Setting Attributes

Use the provided methods to set specific attributes for the a element.

```php
// setting class attribute
$radioList->class('container');
```

Or, use the `attributes` method to set multiple attributes at once.

```php
$radioList->attributes(['class' => 'container', 'style' => 'background-color: #eee;']);
```

## Adding checked

if you want to include the `checked` attribute, use the `checked` method.

```php
$radioList->checked(true);
```

Or add value for matching with the `radio` value attribute.

```php
$radioList->checked('MyValue')->value('MyValue');
```

## Adding label

if you want to include a label, use the `labelContent` method.

```php
$radioList->labelContent('MyLabel');
```

## Adding enclosed by label

if you want to include the `radio` enclosed by the `label` element, use the `enclosedByLabel` method.

```php
$radioList->enclosedByLabel(true);
```

## Adding hidden input

if you want to include a hidden input, use the `uncheckValue` method.

```php
$radioList->uncheckValue('MyValue');
```

## Rendering

Generate the `HTML` output using the `render` method, for simple instantiation. 

```php
$html = $radioList->render();
```

Or, use the magic `__toString` method.

```php
$html = (string) $radioList;
```

## Common use cases

Below are examples of common use cases:

```php
// adding multiple attributes
$radioList->class('external')->value('Myvalue');
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
$radioList->template('<div>{tag}</div>');
```

## Attributes

Refer to the [Attribute Tests](https://github.com/php-forge/html/blob/main/tests/Input/RadioList/AttributeTest.php) for
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
| `id()`             | Set the `id` attribute.                                                                         |
| `name()`           | Set the `name` attribute.                                                                       |
| `style()`          | Set the `style` attribute.                                                                      |
| `tabIndex()`       | Set the `tabindex` attribute.                                                                   |

## Custom methods

Refer to the [Custom Methods Tests](https://github.com/php-forge/html/blob/main/tests/Input/RadioList/CustomMethodTest.php)
for comprehensive examples.

The following methods are available for customizing the `HTML` output:

| Method                       | Description                                                                           |
| ---------------------------- | ------------------------------------------------------------------------------------- |
| `container()`                | Set enabled or disabled for the `container` element.                                  |
| `containerAttributes()`      | Set `attributes` for the `container` element.                                         |
| `containerClass()`           | Set the `class` attribute for the `container` element.                                |
| `containerTag()`             | Set the `tag` for the `container` element.                                            |
| `generateField()`            | Generate the field id and name for the `HTML` output.                                 |
| `items()`                    | Set the `items` for the `HTML` output.                                                |
| `render()`                   | Generates the `HTML` output.                                                          |
| `separator()`                | Set the `separator` for the `HTML` output.                                            |
| `template()`                 | Set the template for the `HTML` output.                                               |
| `uncheckAttributes()`        | Set the attributes for the hidden input tag.                                          |
| `uncheckClass()`             | Set the `class` attribute for the hidden input tag.                                   |
| `uncheckValue()`             | Set the `value` attribute for the hidden input tag.                                   |
| `widget()`                   | Instantiates the `RadioList::class`.                                                  |

## Label methods

Refer to the [Label Tests](https://github.com/php-forge/html/blob/main/tests/Input/RadioList/LabelTest.php) for
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

Refer to the [Validate Tests](https://github.com/php-forge/html/blob/main/tests/Input/RadioList/ValidateTest.php) for
comprehensive examples.

| Method         | Description                                                                                         |
| -------------- | --------------------------------------------------------------------------------------------------- |
| `required()`   | Set the `required` attribute.                                                                       |
