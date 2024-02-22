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
 * The input element with a type attribute whose value is "week" represents a control for setting the element’s value to
 * a string representing a week.
 *
 * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.week.html#input.week
 */
final class Week extends AbstractInput implements RangeLengthInterface, RequiredInterface, ValueInterface
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

        return $this->buildInputTag($this->attributes, 'week');
    }
}
