# TextArea

The `<textarea>` `HTML` element represents a multi-line plain-text editing control, useful when you want to allow users
to enter a sizable amount of free-form text, for example, a comment on a review or feedback form.

## Basic Usage

Instantiate the `TextArea` class using `TextArea::widget()`.

```php
$textArea = TextArea::widget();
```

## Generate field id and name

The `generateField` method is used to generate the field id and name for the `HTML` output.

Allowed arguments are:

- `modelName` - The name of the model.
- `fieldName` - The name of the field.
- `arrayable` - Whether the field is an array. For default, it is `false`.

```php
// generate field id and name
$textArea->generateField('model', 'field');
```

## Setting Attributes

Use the provided methods to set specific attributes for the a element.

```php
// setting class attribute
$textArea->class('container');
```

Or, use the `attributes` method to set multiple attributes at once.

```php
$textArea->attributes(['class' => 'container', 'style' => 'background-color: #eee;']);
```

## Adding Content

If you want to include content within the `textarea` tag, use the `content` method.

```php
$textArea->content('MyContent');
```

## Rendering

Generate the `HTML` output using the `render` method, for simple instantiation. 

```php
$html = $textArea->render();
```

Or, use the magic `__toString` method.

```php
$html = (string) $textArea;
```

## Common Use Cases

Below are examples of common use cases:

```php
// adding multiple attributes
$textArea->class('external')->content('MyContent');

// using data attributes
$textArea->dataAttributes(['analytics' => 'trackClick']);
```

Explore additional methods for setting various attributes such as `lang`, `name`, `style`, `title`, etc.

## Prefix and Suffix

Use `prefix` and `suffix` methods to add text before and after the `textarea` tag, respectively.

```php
// adding a prefix
$html = $textArea->content('MyContent')->prefix('MyPrefix')->render();

// adding a suffix
$html = $textArea->content('MyContent')->suffix('MySuffix')->render();
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
$textArea->template('<div>{tag}</div>');
```

## Attributes

Refer to the [Attribute Tests](https://github.com/php-forge/html/blob/main/tests/TextArea/AttributeTest.php) for 
comprehensive examples.

The following methods are available for setting attributes:

| Method            | Description                                                                                      |
| ----------------- | ------------------------------------------------------------------------------------------------ |
| `attributes()`    | Set multiple `attributes` at once.                                                               |
| `autocomplete()`  | Set the `autocomplete` attribute.                                                                |
| `autofocus()`     | Set the `autofocus` attribute.                                                                   |
| `class()`         | Set the `class` attribute.                                                                       |
| `cols()`          | Set the `cols` attribute.                                                                        |
| `content()`       | Set the `content` within the `textarea` element.                                                 |
| `dataAttributes()`| Set multiple `data-attributes` at once.                                                          |
| `dirName()`       | Set the `dirname` attribute.                                                                     |
| `disabled()`      | Set the `disabled` attribute.                                                                    |
| `form()`          | Set the `form` attribute.                                                                        |
| `id()`            | Set the `id` attribute.                                                                          |
| `lang()`          | Set the `lang` attribute.                                                                        |
| `name()`          | Set the `name` attribute.                                                                        |
| `placeholder()`   | Set the `placeholder` attribute.                                                                 |
| `readOnly()`      | Set the `readonly` attribute.                                                                    |
| `rows()`          | Set the `rows` attribute.                                                                        |
| `style()`         | Set the `style` attribute.                                                                       |
| `tabIndex()`      | Set the `tabindex` attribute.                                                                    |
| `title()`         | Set the `title` attribute.                                                                       |
| `type()`          | Set the `type` attribute.                                                                        |
| `value()`         | Set the `value` attribute.                                                                       |
| `wrap()`          | Set the `wrap` attribute.                                                                        |

## Custom methods

Refer to the [Custom Methods Tests](https://github.com/php-forge/html/blob/main/tests/TextArea/CustomMethodTest.php) for
comprehensive examples.

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
| `tokenValues()`              | Set the token values for the `HTML` output.                                           |
| `widget()`                   | Instantiates the `TextArea::class`.                                                   |

## Validate methods

Refer to the [Validate Tests](https://github.com/php-forge/html/blob/main/tests/TextArea/ValidateTest.php) for 
comprehensive examples.

| Method         | Description                                                                                         |
| -------------- | --------------------------------------------------------------------------------------------------- |
| `maxLength()`  | Set the `maxlength` attribute.                                                                      |
| `minLength()`  | Set the `minlength` attribute.                                                                      |
| `required()`   | Set the `required` attribute.                                                                       |
