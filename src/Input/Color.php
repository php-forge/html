<?php

declare(strict_types=1);

namespace PHPForge\Html\Input;

use PHPForge\Html\Attribute;

/**
 * The input element with a type attribute whose value is "color" represents a color-well control, for setting the
 * element’s value to a string representing a simple color.
 *
 * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.color.html#input.color
 */
final class Color extends Base\AbstractInput
{
    use Attribute\Custom\HasWidgetValidation;
    use Attribute\Input\CanBeRequired;

    protected function run(): string
    {
        $this->validateStringValue($this->getValue());

        return $this->buildInputTag($this->attributes, 'color');
    }
}
