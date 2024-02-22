<?php

declare(strict_types=1);

namespace PHPForge\Html\FormControl\Input;

use PHPForge\Html\{
    Attribute\Custom\HasWidgetValidation,
    Attribute\Input\CanBeRequired,
    Attribute\Input\HasDirname,
    Attribute\Input\HasMaxLength,
    Attribute\Input\HasMinLength,
    Attribute\Input\HasPattern,
    Attribute\Input\HasPlaceholder,
    Attribute\Input\HasSize,
    Attribute\Input\HasValue,
    FormControl\Input\Base\AbstractInput,
    FormControl\Input\Contract\LengthInterface,
    FormControl\Input\Contract\PatternInterface,
    FormControl\Input\Contract\PlaceholderInterface,
    FormControl\Input\Contract\RequiredInterface,
    FormControl\Input\Contract\ValueInterface
};

/**
 * The input element with a type attribute whose value is "search" represents a one-line plain-text edit control for
 * entering one or more search terms.
 *
 * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.search.html#input.search
 */
final class Search extends AbstractInput implements
    LengthInterface,
    PatternInterface,
    PlaceholderInterface,
    RequiredInterface,
    ValueInterface
{
    use CanBeRequired;
    use HasDirname;
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

        return $this->buildInputTag($this->attributes, 'search');
    }
}
