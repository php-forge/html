<?php

declare(strict_types=1);

namespace PHPForge\Html\Input;

use PHPForge\Html\Attribute\Custom\HasWidgetValidation;
use PHPForge\Html\Attribute\Input\{
    CanBeMultiple,
    CanBeRequired,
    HasMaxLength,
    HasMinLength,
    HasPattern,
    HasPlaceholder,
    HasSize,
    HasValue
};
use PHPForge\Html\Input\Contract\{
    LengthInterface,
    PatternInterface,
    PlaceholderInterface,
    RequiredInterface,
    ValueInterface
};

/**
 * The input element with a type attribute whose value is "email" represents a control for editing a list of e-mail
 * addresses given in the element’s value.
 *
 * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.email.html#input.email
 */
final class Email extends Base\AbstractInput implements
    LengthInterface,
    PatternInterface,
    PlaceholderInterface,
    RequiredInterface,
    ValueInterface
{
    use CanBeMultiple;
    use CanBeRequired;
    use HasMaxLength;
    use HasMinLength;
    use HasPattern;
    use HasPlaceholder;
    use HasSize;
    use HasValue;
    use HasWidgetValidation;

    protected function run(): string
    {
        $this->validateString($this->getValue());

        return $this->buildInputTag($this->attributes, 'email');
    }
}
