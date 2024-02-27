<?php

declare(strict_types=1);

namespace PHPForge\Html\FormControl\Input;

use PHPForge\{
    Html\Attribute\Custom\HasValidateString,
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
 * The input element with a type attribute whose value is "password" represents a one-line plain-text edit control for
 * entering a password.
 *
 * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.password.html#input.password
 */
final class Password extends AbstractInput implements
    LengthInterface,
    PatternInterface,
    PlaceholderInterface,
    RequiredInterface,
    ValueInterface
{
    use CanBeRequired;
    use HasMaxLength;
    use HasMinLength;
    use HasPattern;
    use HasPlaceholder;
    use HasSize;
    use HasValidateString;
    use HasValue;

    protected function run(): string
    {
        $this->validateString($this->getValue());

        return $this->buildInputTag($this->attributes, 'password');
    }
}
