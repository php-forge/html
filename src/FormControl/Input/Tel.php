<?php

declare(strict_types=1);

namespace PHPForge\Html\FormControl\Input;

use PHPForge\Html\{
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
    Helper\Validator,
    Interop\LengthInterface,
    Interop\PatternInterface,
    Interop\PlaceholderInterface,
    Interop\RequiredInterface,
    Interop\ValueInterface
};

/**
 * The input element with a type attribute whose value is "tel" represents a one-line plain-text edit control for
 * entering a telephone number.
 *
 * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.tel.html#input.tel
 */
final class Tel extends AbstractInput implements
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
    use HasValue;

    protected string $type = 'tel';

    /**
     * @return string the generated input tag.
     */
    protected function run(): string
    {
        Validator::isNumeric($this->getValue());

        return $this->renderInputTag($this->attributes);
    }
}