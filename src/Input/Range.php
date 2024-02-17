<?php

declare(strict_types=1);

namespace PHPForge\Html\Input;

use PHPForge\Html\Attribute\Custom\HasWidgetValidation;
use PHPForge\Html\Attribute\Input\{HasMax, HasMin, HasStep, HasValue};
use PHPForge\Html\Input\Contract\{RangeLengthInterface, ValueInterface};

/**
 * The input element with a type attribute whose value is "range" represents an imprecise control for setting the
 * element’s value to a string representing a number.
 *
 * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.range.html
 */
final class Range extends Base\AbstractInput implements RangeLengthInterface, ValueInterface
{
    use HasMax;
    use HasMin;
    use HasStep;
    use HasValue;
    use HasWidgetValidation;

    protected function run(): string
    {
        $this->validateNumeric($this->getValue());

        return $this->buildInputTag($this->attributes, 'range');
    }
}
