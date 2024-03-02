<?php

declare(strict_types=1);

namespace PHPForge\Html\FormControl\Input;

use PHPForge\{
    Html\Attribute\Custom\HasValidateString,
    Html\Attribute\Input\CanBeMultiple,
    Html\Attribute\Input\CanBeRequired,
    Html\Attribute\Input\HasMaxLength,
    Html\Attribute\Input\HasMinLength,
    Html\Attribute\Input\HasPattern,
    Html\Attribute\Input\HasPlaceholder,
    Html\Attribute\Input\HasSize,
    Html\Attribute\Input\HasValue,
    Html\FormControl\Input\Base\AbstractInput,
    Html\Interop\LengthInterface,
    Html\Interop\PatternInterface,
    Html\Interop\PlaceholderInterface,
    Html\Interop\RequiredInterface,
    Html\Interop\ValueInterface
};

/**
 * The input element with a type attribute whose value is "email" represents a control for editing a list of e-mail
 * addresses given in the element’s value.
 *
 * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.email.html#input.email
 */
final class Email extends AbstractInput implements
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
    use HasValidateString;
    use HasValue;

    protected string $type = 'email';

    protected function run(): string
    {
        $this->validateString($this->getValue());

        return $this->renderInputTag($this->attributes);
    }
}
