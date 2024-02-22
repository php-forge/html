<?php

declare(strict_types=1);

namespace PHPForge\Html\FormControl\Input;

use PHPForge\Html\{
    Attribute\Custom\HasWidgetValidation,
    Attribute\Input\CanBeRequired,
    Attribute\Input\HasMax,
    Attribute\Input\HasMin,
    Attribute\Input\HasStep,
    Attribute\Input\HasValue,
    FormControl\Input\Base\AbstractInput,
    FormControl\Input\Contract\RangeLengthInterface,
    FormControl\Input\Contract\RequiredInterface,
    FormControl\Input\Contract\ValueInterface
};

/**
 * The input element with a type attribute whose value is "time" represents a control for setting the element’s value to
 * a string representing a time (with no timezone information).
 *
 * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.time.html#input.time
 */
final class Time extends AbstractInput implements RangeLengthInterface, RequiredInterface, ValueInterface
{
    use CanBeRequired;
    use HasMax;
    use HasMin;
    use HasStep;
    use HasValue;
    use HasWidgetValidation;

    protected function run(): string
    {
        $this->validateString($this->getValue());

        return $this->buildInputTag($this->attributes, 'time');
    }
}
