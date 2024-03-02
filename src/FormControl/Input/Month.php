<?php

declare(strict_types=1);

namespace PHPForge\Html\FormControl\Input;

use PHPForge\{
    Html\Attribute\Custom\HasValidateString,
    Html\Attribute\FormControl\CanBeRequired,
    Html\Attribute\Input\HasMax,
    Html\Attribute\Input\HasMin,
    Html\Attribute\Input\HasStep,
    Html\Attribute\Input\HasValue,
    Html\FormControl\Input\Base\AbstractInput,
    Html\Interop\RangeLengthInterface,
    Html\Interop\RequiredInterface,
    Html\Interop\ValueInterface
};

/**
 * The input element with a type attribute whose value is "month" represents a control for setting the element’s value
 * to a string representing a month.
 *
 * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.month.html#input.month
 */
final class Month extends AbstractInput implements RangeLengthInterface, RequiredInterface, ValueInterface
{
    use CanBeRequired;
    use HasMax;
    use HasMin;
    use HasStep;
    use HasValidateString;
    use HasValue;

    protected string $type = 'month';

    protected function run(): string
    {
        $this->validateString($this->getValue());

        return $this->renderInputTag($this->attributes);
    }
}
