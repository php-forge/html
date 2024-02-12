# Form

The `<form>` `HTML` element represents a document section containing interactive controls for submitting information.

## Basic Usage

Instantiate the `Form` class using `Form::widget()`.

```php
$form = Form::widget();
```

Or, block style instantiation.

```php
<?= Form::begin() ?>
    // ... content to be wrapped by `form` element
<?= Form::end() ?>
```

## Setting Attributes

Use the provided methods to set specific attributes for the a element.

```php
// setting class attribute
$form->class('container');
```

Or, use the `attributes` method to set multiple attributes at once.

```php
$form->attributes(['class' => 'container', 'style' => 'background-color: #eee;']);
```

## Adding Content

If you want to include content within the `form` tag, use the `content` method.

```php
$form->content('My content');
```

Or, use `begin()` and `end()` methods to wrap content.

```php
<?= Form::begin() ?>
    My content
<?= Form::end() ?>
```

## Rendering

Generate the `HTML` output using the `render` method, for simple instantiation. 

```php
$html = $form->render();
```

For block style instantiation, use the `end()` method, which returns the `HTML` output.

```php
$html = Form::end();
```

Or, use the magic `__toString` method.

```php
$html = (string) $form;
```

## Common Use Cases

Below are examples of common use cases:

```php
// adding multiple attributes
$form->class('external')->content('My content');

// using data attributes
$form->dataAttributes(['analytics' => 'trackClick']);

// form with content
Form::widget()
    ->action('/foo')
    ->content('value', PHP_EOL, Span::widget()->content('value'))
    ->csrf('csrf-token')
    ->method('POST')
    ->render()
```

Explore additional methods for setting various attributes such as `action`, `method`, `name`, `style`, `title`, etc.

## Attributes

Refer to the [Attribute Tests](https://github.com/php-forge/html/blob/main/tests/Form/AttributeTest.php) for
comprehensive examples.

The following methods are available for setting attributes:

| Method            | Description                                                                                      |
| ----------------- | ------------------------------------------------------------------------------------------------ |
| `accept()`        | Set the `accept` attribute.                                                                      |
| `action()`        | Set the `action` attribute.                                                                      |
| `attributes()`    | Set multiple `attributes` at once.                                                               |
| `autocomplete()`  | Set the `autocomplete` attribute.                                                                |
| `class()`         | Set the `class` attribute.                                                                       |
| `content()`       | Set the `content` within the `form` element.                                                     |
| `dataAttributes()`| Set multiple `data-attributes` at once.                                                          |
| `enctype()`       | Set the `enctype` attribute.                                                                     |
| `id()`            | Set the `id` attribute.                                                                          |
| `lang()`          | Set the `lang` attribute.                                                                        |
| `method()`        | Set the `method` attribute.                                                                      |
| `name()`          | Set the `name` attribute.                                                                        |
| `novalidate()`    | Set the `novalidate` attribute.                                                                  |
| `rel()`           | Set the `rel` attribute.                                                                         |
| `style()`         | Set the `style` attribute.                                                                       |
| `title()`         | Set the `title` attribute.                                                                       |

## Custom methods

Refer to the [Custom Methods Tests](https://github.com/php-forge/html/blob/main/tests/Form/CustomMethodTest.php) for
comprehensive examples.

The following methods are available for customizing the `HTML` output:

| Method    | Description                                                                                              |
| --------- | -------------------------------------------------------------------------------------------------------- |
| `begin() `| Start the `form` element.                                                                                |
| `end()`   | End the `form` element, and generate the `HTML` output.                                                  |
| `render()`| Generates the `HTML` output.                                                                             |
| `widget()`| Instantiates the `Body::class`.                                                                          |
