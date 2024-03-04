<?php

declare(strict_types=1);

namespace PHPForge\Html\FormControl\Input;

use PHPForge\Html\{
    Attribute\FormControl\CanBeRequired,
    Attribute\Input\HasMax,
    Attribute\Input\HasMin,
    Attribute\Input\HasPlaceholder,
    Attribute\Input\HasStep,
    Attribute\Input\HasValue,
    FormControl\Input\Base\AbstractInput,
    Helper\Validator,
    Interop\PlaceholderInterface,
    Interop\RangeLengthInterface,
    Interop\RequiredInterface,
    Interop\ValueInterface
};

/**
 * The input element with a type attribute whose value is "range" represents an imprecise control for setting the
 * element’s value to a string representing a number.
 *
 * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.number.html
 */
final class Number extends AbstractInput implements
    PlaceholderInterface,
    RangeLengthInterface,
    RequiredInterface,
    ValueInterface
{
    use CanBeRequired;
    use HasMax;
    use HasMin;
    use HasPlaceholder;
    use HasStep;
    use HasValue;

    protected string $type = 'number';

    protected function run(): string
    {
        Validator::isNumeric($this->getValue());

        return $this->renderInputTag($this->attributes);
    }
}
