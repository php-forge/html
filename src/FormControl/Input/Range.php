<?php

declare(strict_types=1);

namespace PHPForge\Html\FormControl\Input;

use PHPForge\Html\{
    Attribute\Custom\HasValidateNumeric,
    Attribute\Input\HasMax,
    Attribute\Input\HasMin,
    Attribute\Input\HasStep,
    Attribute\Input\HasValue,
    FormControl\Input\Base\AbstractInput,
    FormControl\Input\Contract\RangeLengthInterface,
    FormControl\Input\Contract\ValueInterface
};

/**
 * The input element with a type attribute whose value is "range" represents an imprecise control for setting the
 * element’s value to a string representing a number.
 *
 * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.range.html
 */
final class Range extends AbstractInput implements RangeLengthInterface, ValueInterface
{
    use HasMax;
    use HasMin;
    use HasStep;
    use HasValidateNumeric;
    use HasValue;

    protected function run(): string
    {
        $this->validateNumeric($this->getValue());

        return $this->buildInputTag($this->attributes, 'range');
    }
}
