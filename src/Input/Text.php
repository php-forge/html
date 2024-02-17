<?php

declare(strict_types=1);

namespace PHPForge\Html\Input;

use PHPForge\Html\Attribute\Custom\HasWidgetValidation;
use PHPForge\Html\Attribute\Input\{
    CanBeRequired,
    HasDirname,
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
 * The input element with a type attribute whose value is "text" represents a one-line plain text edit control for the
 * input element’s value.
 *
 * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.text.html#input.text
 */
final class Text extends Base\AbstractInput implements
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

        return $this->buildInputTag($this->attributes, 'text');
    }
}
