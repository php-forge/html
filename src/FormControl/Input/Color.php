<?php

declare(strict_types=1);

namespace PHPForge\Html\FormControl\Input;

use PHPForge\{
    Html\Attribute\Custom\HasValidateString,
    Html\Attribute\Input\CanBeRequired,
    Html\Attribute\Input\HasValue,
    Html\Interop\RequiredInterface,
    Html\Interop\ValueInterface
};

/**
 * The input element with a type attribute whose value is "color" represents a color-well control, for setting the
 * element’s value to a string representing a simple color.
 *
 * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.color.html#input.color
 */
final class Color extends Base\AbstractInput implements RequiredInterface, ValueInterface
{
    use CanBeRequired;
    use HasValidateString;
    use HasValue;

    protected string $type = 'color';

    protected function run(): string
    {
        $this->validateString($this->getValue());

        return $this->renderInputTag($this->attributes);
    }
}
