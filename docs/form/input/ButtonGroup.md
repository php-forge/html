# ButtonGroup

ButtonGroup renders a button group widget.

## Basic Usage

Instantiate the `ButtonGroup` class using `ButtonGroup::widget()`.

```php
$buttonGroup = ButtonGroup::widget();
```

## Buttons

Add buttons to the `ButtonGroup` widget using the `buttons` method.

```php
$buttonGroup->buttons(
    ButtonGroup::widget()->labelContent('Submit')->type('submit'),
    ButtonGroup::widget()->labelContent('Reset')->type('reset')
);
```

## Rendering

Generate the `HTML` output using the `render` method, for simple instantiation. 

```php
$html = $buttonGroup->render();
```

Or, use the magic `__toString` method.

```php
$html = (string) $buttonGroup;
```

## Common use cases

Below are examples of common use cases:

```php
// adding multiple attributes
$buttonGroup->container()->containerClass('MyClass');
```

## Custom methods

Refer to the [Custom Methods Tests](https://github.com/php-forge/html/blob/main/tests/Input/ButtonGroup/CustomMethodTest.php) 
for comprehensive examples.

The following methods are available for customizing the `HTML` output:

| Method                 | Description                                                                                 |
| ---------------------- | ------------------------------------------------------------------------------------------- |
| `buttons()`            | Set the `buttons` for the `ButtonGroup` widget.                                             |
| `container()`          | Set enabled or disabled for the `container` element.                                        |
| `containerAttributes()`| Set `attributes` for the `container` element.                                               |
| `containerClass()`     | Set the `class` attribute for the `container` element.                                      |
| `containerTag()`       | Set the `tag` for the `container` element.                                                  |
| `individualContainer()`| Set enabled or disabled for the `individualContainer` for each button.                      |
| `render()`             | Generates the `HTML` output.                                                                |
| `widget()`             | Instantiates the `ButtonGroup::class`.                                                      |
