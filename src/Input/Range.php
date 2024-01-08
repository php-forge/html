<?php

declare(strict_types=1);

namespace PHPForge\Html\Input;

use PHPForge\Html\Attribute;

/**
 * The input element with a type attribute whose value is "range" represents an imprecise control for setting the
 * element’s value to a string representing a number.
 *
 * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.range.html
 */
final class Range extends Base\AbstractInput implements Contract\RangeLengthInterface
{
    use Attribute\Custom\HasWidgetValidation;
    use Attribute\Input\HasMax;
    use Attribute\Input\HasMin;
    use Attribute\Input\HasStep;

    protected function run(): string
    {
        $this->validateNumericValue($this->getValue());

        return $this->buildInputTag($this->attributes, 'range');
    }
}
