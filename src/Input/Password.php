<?php

declare(strict_types=1);

namespace PHPForge\Html\Input;

use PHPForge\Html\Attribute\Custom\HasWidgetValidation;
use PHPForge\Html\Attribute\Input\{
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
 * The input element with a type attribute whose value is "password" represents a one-line plain-text edit control for
 * entering a password.
 *
 * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.password.html#input.password
 */
final class Password extends Base\AbstractInput implements
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
    use HasValue;
    use HasWidgetValidation;

    protected function run(): string
    {
        $this->validateString($this->getValue());

        return $this->buildInputTag($this->attributes, 'password');
    }
}
