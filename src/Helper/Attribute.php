<?php

declare(strict_types=1);

namespace Forge\Html\Helper;

use function array_unique;
use function implode;
use function in_array;
use function is_array;
use function is_int;
use function preg_split;

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
            if (is_string($value) && '' !== $value) {
                /** @psalm-var string $attributes['class'] */
                $values = preg_split('/\s+/', $attributes[$attribute], -1, PREG_SPLIT_NO_EMPTY);
                $attributes[$attribute] = implode(PHP_EOL, self::merge($values, (array) $value));
            } else {
                $attributes[$attribute] = $value[0];
            }
        } elseif ($value !== [] && $value !== '') {
            $attributes[$attribute] = $value;
        }
    }
}
