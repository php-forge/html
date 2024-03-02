<?php

declare(strict_types=1);

namespace PHPForge\Html\FormControl\Input;

use PHPForge\Html\{
    Attribute\Custom\HasValidateString,
    Attribute\FormControl\CanBeRequired,
    Attribute\FormControl\HasAutocomplete,
    Attribute\FormControl\HasDirname,
    Attribute\Input\HasMaxLength,
    Attribute\Input\HasMinLength,
    Attribute\Input\HasPattern,
    Attribute\Input\HasPlaceholder,
    Attribute\Input\HasSize,
    Attribute\Input\HasValue,
    FormControl\Input\Base\AbstractInput,
    Interop\LengthInterface,
    Interop\PatternInterface,
    Interop\PlaceholderInterface,
    Interop\RequiredInterface,
    Interop\ValueInterface
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
    use HasAutocomplete;
    use HasDirname;
    use HasMaxLength;
    use HasMinLength;
    use HasPattern;
    use HasPlaceholder;
    use HasSize;
    use HasValidateString;
    use HasValue;

    protected string $type = 'password';

    protected function run(): string
    {
        $this->validateString($this->getValue());

        return $this->renderInputTag($this->attributes);
    }
}
