<?php

declare(strict_types=1);

namespace PHPForge\Html\Input\Base;

use InvalidArgumentException;
use PHPForge\Html\Attribute;

use function is_string;

abstract class AbstractControl extends AbstractInput
{
    use Attribute\Input\HasMax;
    use Attribute\Input\HasMin;
    use Attribute\Input\HasStep;

    protected string $type = '';

    protected function run(): string
    {
        $value = $this->getValue();

        /**
         * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.date.html#input.date.attrs.value
         */
        if ($value !== null && is_string($value) === false && $this->type !== 'range') {
            throw new InvalidArgumentException(
                sprintf('%s::class widget must be a string or null value.', static::class)
            );
        }

        if ($value !== null && $value !== '' && is_numeric($value) === false && $this->type === 'range') {
            throw new InvalidArgumentException(
                sprintf('%s::class widget must be a numeric or null value.', static::class)
            );
        }

        return $this->buildInputTag($this->attributes, $this->type)->render();
    }
}
