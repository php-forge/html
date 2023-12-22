<?php

declare(strict_types=1);

namespace PHPForge\Html\Input\Base;

use InvalidArgumentException;
use PHPForge\Html\Attribute;

use function is_string;

abstract class AbstractColor extends AbstractInput
{
    use Attribute\Input\CanBeRequired;

    /**
     * @return string the generated input tag.
     */
    protected function run(): string
    {
        $value = $this->getValue();

        /**
         * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.color.html#input.color.attrs.value
         */
        if ($value !== null && is_string($value) === false) {
            throw new InvalidArgumentException(
                sprintf('%s::class widget must be a string or null value.', static::class)
            );
        }

        return $this->buildInputTag($this->attributes, 'color')->render();
    }
}
