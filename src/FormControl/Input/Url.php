<?php

declare(strict_types=1);

namespace PHPForge\Html\FormControl\Input;

use PHPForge\Html\{
    Attribute\Custom\HasWidgetValidation,
    Attribute\Input\CanBeRequired,
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
 * The input element with a type attribute whose value is "url" represents a control for editing an absolute URL given
 * in the element’s value.
 *
 * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.url.html
 */
final class Url extends AbstractInput implements
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

        return $this->buildInputTag($this->attributes, 'url');
    }
}
