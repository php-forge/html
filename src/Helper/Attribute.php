<?php

declare(strict_types=1);

namespace Forge\Html\Helper;

use function is_array;

final class Attribute
{
    /**
     * Adds a attribute (or several attributes) to the specified options.
     *
     * @param array $attributes The attributes to be modified.
     * @param string $name The name of the attribute to be added.
     * @param mixed $value The value of the attribute to be added.
     */
    public static function add(array &$attributes, string $attribute, mixed $value): void
    {
        if (isset($attributes[$attribute])) {
            if (is_array($value)) {
                /** @var mixed */
                $attributes[$attribute] = $value[0];
            }
        } elseif ($value !== [] && $value !== '') {
            /** @var mixed */
            $attributes[$attribute] = $value;
        }
    }
}
