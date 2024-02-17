# Hidden

The input element with a type attribute whose value is `hidden` represents a value not intended to be examined or
manipulated by the user.

## Basic Usage

Instantiate the `Hidden` class using `Hidden::widget()`.

```php
$Hidden = Hidden::widget();
```

## Setting Attributes

Use the provided methods to set specific attributes for the a element.

```php
// setting class attribute
$Hidden->class('container');
```

Or, use the `attributes` method to set multiple attributes at once.

```php
$Hidden->attributes(['class' => 'container', 'style' => 'background-color: #eee;']);
```

## Rendering

Generate the `HTML` output using the `render` method, for simple instantiation. 

```php
$html = $Hidden->render();
```

Or, use the magic `__toString` method.

```php
$html = (string) $Hidden;
```

## Common use cases

Below are examples of common use cases:

```php
// adding multiple attributes
$Hidden->class('external')->value('Myvalue');
```

Explore additional methods for setting various attributes such as  `id`, `name`, `style`, `value`, etc.

## Attributes

Refer to the [Attribute Tests](https://github.com/php-forge/html/blob/main/tests/Input/Hidden/AttributeTest.php) for 
comprehensive examples.

The following methods are available for setting attributes:

| Method             | Description                                                                                     |
| ------------------ | ----------------------------------------------------------------------------------------------- |
| `attributes()`     | Set multiple `attributes` at once.                                                              |
| `class()`          | Set the `class` attribute.                                                                      |
| `disabled()`       | Set the `disabled` attribute.                                                                   |
| `id()`             | Set the `id` attribute.                                                                         |
| `name()`           | Set the `name` attribute.                                                                       |
| `style()`          | Set the `style` attribute.                                                                      |
| `value()`          | Set the `value` attribute.                                                                      |

## Custom methods

Refer to the [Custom Methods Tests](https://github.com/php-forge/html/blob/main/tests/Input/Hidden/CustomMethodTest.php)
for comprehensive examples.

The following methods are available for customizing the `HTML` output:

| Method                       | Description                                                                           |
| ---------------------------- | ------------------------------------------------------------------------------------- |
| `render()`                   | Generates the `HTML` output.                                                          |
| `widget()`                   | Instantiates the `Hidden::class`.                                                     |
