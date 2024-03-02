# Select

The `<select>` `HTML` element represents a control that provides a menu of options.

## Basic Usage

Instantiate the `Select` class using `Select::widget()`.

```php
$select = Select::widget();
```

## Generate field id and name

The `fieldAttributes` method is used to generate the field id and name for the `HTML` output.

Allowed arguments are:

- `formModel` - The name of the model.
- `property` - The name of the field.

```php
// generate field id and name
$select->fieldAttributes('model', 'field');
```

## Setting Attributes

Use the provided methods to set specific attributes for the a element.

```php
// setting class attribute
$select->class('MyClass');
```

Or, use the `attributes` method to set multiple attributes at once.

```php
$select->attributes(['class' => 'MyClass', 'id' => 'myId']);
```

## Add items

use the `item` method to add items to the `select` element.

```php
<?= 
    Select::widget()
        ->items(
            [
                1 => 'Moscu',
                2 => 'Paris',
            ]
        )
?>
```

## Add items with groups

use the `groups` method to add items to the `select` element.

```php
<?php

declare(strict_types=1);

private array $cities = [
    1 => [
        2 => ' Moscu',
        3 => ' San Petersburgo',
        4 => ' Novosibirsk',
        5 => ' Ekaterinburgo',
    ],
    2 => [
        6 => 'Santiago',
        7 => 'Concepcion',
        8 => 'Chillan',
    ],
];
private array $groups = [
    1 => [
        'label' => 'Russia',
    ],
    2 => [
        'label' => 'Chile',
    ],
];
?>

<?= Select::widget()->groups($this->groups)->items($this->cities) ?>
```

use the `itemsAttributes` method to add attributes to the `option` element.

```php
<?php

declare(strict_types=1);

private array $cities = [
    1 => [
        2 => ' Moscu',
        3 => ' San Petersburgo',
        4 => ' Novosibirsk',
        5 => ' Ekaterinburgo',
    ],
    2 => [
        6 => 'Santiago',
        7 => 'Concepcion',
        8 => 'Chillan',
    ],
];
private array $groups = [
    1 => [
        'label' => 'Russia',
    ],
    2 => [
        'label' => 'Chile',
    ],
];
?>

<?= Select::widget()->groups($this->groups)->items($this->cities)->itemsAttributes([2 => ['disabled' => true]]) ?>
```

## Add prompt

use the `prompt` method to add a prompt to the `select` element.

For default the `prompt` value is `Select an option`.

```php
<?php

declare(strict_types=1);

private array $cities = [
    '1' => 'Moscu',
    '2' => 'San Petersburgo',
    '3' => 'Novosibirsk',
    '4' => 'Ekaterinburgo',
];
?>

<?= Select::widget()->items($this->cities)->prompt('Select City Birth') ?>
```

## Rendering

Generate the `HTML` output using the `render` method.

```php
$html = $select->render();
```

Or, use the magic `__toString` method.

```php
$html = (string) $select;
```

## Common Use Cases

Below are examples of common use cases:

```php
// adding multiple attributes
$select->class('MyClass')->required();
```

```php
// setting the `multiple` attribute
$select->multiple();
```

```php
// setting the `size` attribute
$select->size(5);
```

Explore additional methods for setting various attributes such as `lang`, `multiple`, `size`, `tabindex`, `title`, and
more.

## Prefix and Suffix

Use `prefix` and `suffix` methods to add text before and after the `select` tag, respectively.

```php
// adding a prefix
$html = $select->prefix('MyPrefix')->render();

// adding a suffix
$html = $select->suffix('MySuffix')->render();
```

## Attributes

Refer to the [Attribute Tests](https://github.com/php-forge/html/blob/main/tests/FormControl/Select/AttributeTest.php)
for comprehensive examples.

The following methods are available for setting attributes:

| Method            | Description                                                                                      |
| ----------------- | ------------------------------------------------------------------------------------------------ |
| `ariaLabel()`     | Set the `aria-label` attribute.                                                                  |
| `attributes()`    | Set multiple `attributes` at once.                                                               |
| `autocomplete()`  | Set the `autocomplete` attribute.                                                                |
| `autofocus()`     | Set the `autofocus` attribute.                                                                   |
| `class()`         | Set the `class` attribute.                                                                       |
| `disabled()`      | Set the `disabled` attribute.                                                                    |
| `dataAttributes()`| Set multiple `data-attributes` at once.                                                          |
| `id()`            | Set the `id` attribute.                                                                          |
| `name()`          | Set the `name` attribute.                                                                        |
| `prompt()`        | Set the `prompt` attribute.                                                                      |
| `required()`      | Set the `required` attribute.                                                                    |
| `size()`          | Set the `size` attribute.                                                                        |
| `style()`         | Set the `style` attribute.                                                                       |
| `tabindex()`      | Set the `tabindex` attribute.                                                                    |
| `value()`         | Set the `value` attribute.                                                                       |

## Custom methods

Refer to the [Custom Method Test](https://github.com/php-forge/html/blob/main/tests/FormControl/Select/CustomMethodTest.php)
for comprehensive examples.

The following methods are available for customizing the `HTML` output:

| Method                       | Description                                                                           |
| ---------------------------- | ------------------------------------------------------------------------------------- |
| `disableLabel()`             | Set enabled or disabled for the `label` element.                                      |
| `fieldAttributes()`          | Set `attributes` for the `field` element.                                             |
| `groups()`                   | Add `groups` to the `select` element.                                                 |
| `items()`                    | Add `items` to the `select` element.                                                  |
| `itemsAttributes()`          | Add `attributes` to the `items` element.                                              |
| `labelAttributes()`          | Set `attributes` for the `label` element.                                             |
| `labelClass()`               | Set the `class` attribute for the `label` element.                                    |
| `labelContent()`             | Set the `content` for the `label` element.                                            |
| `labelFor()`                 | Set the `for` attribute for the `label` element.                                      |
| `prefix()`                   | Add text before the `select` element.                                                 |
| `prefixContainer()`          | Set enabled or disabled for the `prefix-container` element.                           |
| `prefixContainerAttributes()`| Set `attributes` for the `prefix-container` element.                                  |
| `prefixContainerClass()`     | Set the `class` attribute for the `prefix-container` element.                         |
| `prefixContainerTag()`       | Set the `tag` for the `prefix-container` element.                                     |
| `render()`                   | Generates the `HTML` output.                                                          |
| `suffix()`                   | Add text after the `select` element.                                                  |
| `suffixContainer()`          | Set enabled or disabled for the `suffix-container` element.                           |
| `suffixContainerAttributes()`| Set `attributes` for the `suffix-container` element.                                  |
| `suffixContainerClass()`     | Set the `class` attribute for the `suffix-container` element.                         |
| `suffixContainerTag()`       | Set the `tag` for the `suffix-container` element.                                     |
| `widget()`                   | Instantiates the `Select::class`.                                                     |
