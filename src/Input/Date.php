<?php

declare(strict_types=1);

namespace PHPForge\Html\Input;

use PHPForge\Html\Attribute;

/**
 * The input element with a type attribute whose value is "date" represents a control for setting the element’s value to
 * a string representing a date.
 *
 * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.date.html#input.date
 */
final class Date extends Base\AbstractInput
{
    use Attribute\Custom\HasWidgetValidation;
    use Attribute\Input\HasMax;
    use Attribute\Input\HasMin;
    use Attribute\Input\HasStep;

    protected function run(): string
    {
        $this->validateStringValue($this->getValue());

        return $this->buildInputTag($this->attributes, 'date');
    }
}
