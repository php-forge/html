<?php

declare(strict_types=1);

namespace PHPForge\Html\Input;

use PHPForge\Html\Attribute;
use PHPForge\Html\Input\Contract\PlaceholderInterface;

/**
 * The input element with a type attribute whose value is "text" represents a one-line plain text edit control for the
 * input element’s value.
 *
 * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.text.html#input.text
 */
final class Text extends Base\AbstractInput implements RuleHtmlByAttributeInterface, PlaceholderInterface
{
    use Attribute\Custom\HasWidgetValidation;
    use Attribute\Input\CanBeRequired;
    use Attribute\Input\HasDirname;
    use Attribute\Input\HasMaxLength;
    use Attribute\Input\HasMinLength;
    use Attribute\Input\HasPattern;
    use Attribute\Input\HasPlaceholder;
    use Attribute\Input\HasSize;

    protected function run(): string
    {
        $this->validateStringValue($this->getValue());

        return $this->buildInputTag($this->attributes, 'text');
    }
}
