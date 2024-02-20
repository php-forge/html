<?php

declare(strict_types=1);

namespace PHPForge\Html\FormControl\Input;

use PHPForge\Html\Attribute\Custom\HasWidgetValidation;
use PHPForge\Html\Attribute\Input\{
    CanBeRequired,
    HasMax,
    HasMin,
    HasPlaceholder,
    HasStep,
    HasValue
};

/**
 * The input element with a type attribute whose value is "range" represents an imprecise control for setting the
 * element’s value to a string representing a number.
 *
 * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.number.html
 */
final class Number extends Base\AbstractInput implements
    Contract\PlaceholderInterface,
    Contract\RangeLengthInterface,
    Contract\RequiredInterface,
    Contract\ValueInterface
{
    use CanBeRequired;
    use HasMax;
    use HasMin;
    use HasPlaceholder;
    use HasStep;
    use HasValue;
    use HasWidgetValidation;

    protected function run(): string
    {
        $this->validateNumeric($this->getValue());

        return $this->buildInputTag($this->attributes, 'number');
    }
}
