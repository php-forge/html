<?php

declare(strict_types=1);

namespace PHPForge\Html\Input;

use PHPForge\Html\Attribute;

/**
 * The input element with a type attribute whose value is "time" represents a control for setting the element’s value to
 * a string representing a time (with no timezone information).
 *
 * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.time.html#input.time
 */
final class Time extends Base\AbstractInput implements Contract\RangeLengthInterface, Contract\RequiredInterface
{
    use Attribute\Custom\HasWidgetValidation;
    use Attribute\Input\CanBeRequired;
    use Attribute\Input\HasMax;
    use Attribute\Input\HasMin;
    use Attribute\Input\HasStep;

    protected function run(): string
    {
        $this->validateString($this->getValue());

        return $this->buildInputTag($this->attributes, 'time');
    }
}
