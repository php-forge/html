<?php

declare(strict_types=1);

namespace PHPForge\Html\Input\Base;

use InvalidArgumentException;

use function is_string;

abstract class AbstractColor extends AbstractInput
{
    protected string $type = 'color';

    /**
     * @return string the generated input tag.
     */
    protected function run(): string
    {
        $attributes = $this->attributes;
        $value = $attributes['value'] ?? null;

        /**
         * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.color.html#input.color.attrs.value
         */
        if ($value !== null && is_string($value) === false) {
            throw new InvalidArgumentException(
                sprintf('%s::class widget must be a string or null value.', static::class)
            );
        }

        return parent::run();
    }
}
