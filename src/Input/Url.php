<?php

declare(strict_types=1);

namespace PHPForge\Html\Input;

use PHPForge\Html\Attribute;

/**
 * The input element with a type attribute whose value is "url" represents a control for editing an absolute URL given
 * in the element’s value.
 *
 * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.url.html
 */
final class Url extends Base\AbstractInput implements
    Contract\LengthInterface,
    Contract\PatternInterface,
    Contract\PlaceholderInterface,
    Contract\RequiredInterface
{
    use Attribute\Custom\HasWidgetValidation;
    use Attribute\Input\CanBeRequired;
    use Attribute\Input\HasMaxLength;
    use Attribute\Input\HasMinLength;
    use Attribute\Input\HasPattern;
    use Attribute\Input\HasPlaceholder;
    use Attribute\Input\HasSize;

    protected function run(): string
    {
        $this->validateString($this->getValue());

        return $this->buildInputTag($this->attributes, 'url');
    }
}
