<?php

declare(strict_types=1);

namespace PHPForge\Html\FormControl\Input;

use PHPForge\{
    Html\Attribute\Custom\HasValidateString,
    Html\Attribute\Input\CanBeRequired,
    Html\Attribute\Input\HasMax,
    Html\Attribute\Input\HasMin,
    Html\Attribute\Input\HasStep,
    Html\Attribute\Input\HasValue,
    Html\Helper\Utils,
    Html\Interop\RangeLengthInterface,
    Html\Interop\RequiredInterface,
    Html\Interop\ValueInterface
};

/**
 * The input element with a type attribute whose value is "datetime-local" represents a control for setting the
 * element’s value to a string representing a local date and time (with no timezone information).
 *
 * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.datetime-local.html#input.datetime-local
 */
final class DatetimeLocal extends Base\AbstractInput implements RangeLengthInterface, RequiredInterface, ValueInterface
{
    use CanBeRequired;
    use HasMax;
    use HasMin;
    use HasStep;
    use HasValidateString;
    use HasValue;

    /**
     * This method is used to configure the widget with the provided default definitions.
     */
    protected function loadDefaultDefinitions(): array
    {
        return [
            'id()' => [Utils::generateId('datetime-local-')],
            'template()' => ['{prefix}\n{tag}\n{suffix}'],
        ];
    }

    protected function run(): string
    {
        $this->validateString($this->getValue());

        return $this->buildInputTag($this->attributes, 'datetime-local');
    }
}
