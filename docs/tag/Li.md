# Li

The `<li>` `HTML` element is used to represent an item in a list.

It must be contained in a parent element: an ordered list `<ol>`, an unordered list `<ul>`, or a menu `<menu>`.

In menus and unordered lists, list items are usually displayed using bullet points. In ordered lists, they are usually
displayed with an ascending counter on the left, such as a number or letter.

## Basic Usage

Instantiate the `Li` class using `Li::widget()`.

```php
$li = Li::widget();
```

## Setting Attributes

Use the provided methods to set specific attributes for the a element.

```php
// setting class attribute
$li->class('external');
```

Or, use the `attributes` method to set multiple attributes at once.

```php
$li->attributes(['class' => 'external', 'title' => 'MyTitle']);
```

## Adding Content

If you want to include content within the `li` tag, use the `content` method.

```php
$li->content('MyContent');
```

## Rendering

Generate the `HTML` output using the `render` method.

```php
$html = $li->render();
```

Or, use the magic `__toString` method.

```php
$html = (string) $li;
```

## Common Use Cases

Below are examples of common use cases:

```php
// adding multiple attributes
$li->class('external')->content('MyContent')->title('MyTitle');
```

Explore additional methods for setting various attributes such as `lang`, `tabindex`, `title`, `value` and more.

## Attributes

Refer to the [Attribute Tests](https://github.com/php-forge/html/blob/main/tests/Li/AttributeTest.php) for comprehensive
examples.

The following methods are available for setting attributes:

| Method            | Description                                                                                      |
| ----------------- | ------------------------------------------------------------------------------------------------ |
| `attributes()`    | Set multiple `attributes` at once.                                                               |
| `class()`         | Set the `class` attribute.                                                                       |
| `content()`       | Set the `content` within the `li` element.                                                       |
| `id()`            | Set the `id` attribute.                                                                          |
| `lang()`          | Set the `lang` attribute.                                                                        |
| `name()`          | Set the `name` attribute.                                                                        |
| `style()`         | Set the `style` attribute.                                                                       |
| `tabindex()`      | Set the `tabindex` attribute.                                                                    |
| `title()`         | Set the `title` attribute.                                                                       |
| `value()`         | Set the `value` attribute.                                                                       |

## Custom methods

Refer to the [Custom Method Test](https://github.com/php-forge/html/blob/main/tests/Li/CustomMethodTest.php) for 
comprehensive examples.

The following methods are available for customizing the `HTML` output:

| Method                       | Description                                                                           |
| ---------------------------- | ------------------------------------------------------------------------------------- |
| `render()`                   | Generates the `HTML` output.                                                          |
| `widget()`                   | Instantiates the `Li::class`.                                                         |
