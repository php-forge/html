<?php

declare(strict_types=1);

namespace PHPForge\Html\FormControl\Input;

use PHPForge\{
    Html\Attribute\Custom\HasValidateNumeric,
    Html\Attribute\FormControl\HasAutocomplete,
    Html\Attribute\Input\HasMax,
    Html\Attribute\Input\HasMin,
    Html\Attribute\Input\HasStep,
    Html\Attribute\Input\HasValue,
    Html\FormControl\Input\Base\AbstractInput,
    Html\Interop\RangeLengthInterface,
    Html\Interop\ValueInterface
};

/**
 * The input element with a type attribute whose value is "range" represents an imprecise control for setting the
 * element’s value to a string representing a number.
 *
 * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.range.html
 */
final class Range extends AbstractInput implements RangeLengthInterface, ValueInterface
{
    use HasAutocomplete;
    use HasMax;
    use HasMin;
    use HasStep;
    use HasValidateNumeric;
    use HasValue;

    protected string $type = 'range';

    protected function run(): string
    {
        $this->validateNumeric($this->getValue());

        return $this->renderInputTag($this->attributes);
    }
}
