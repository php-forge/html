<?php

declare(strict_types=1);

namespace PHPForge\Html\Input;

use PHPForge\Html\Attribute;

/**
 * The input element with a type attribute whose value is "search" represents a one-line plain-text edit control for
 * entering one or more search terms.
 *
 * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.search.html#input.search
 */
final class Search extends Base\AbstractInput implements
    Contract\LengthInterface,
    Contract\PatternInterface,
    Contract\PlaceholderInterface,
    Contract\RequiredInterface
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
        $this->validateString($this->getValue());

        return $this->buildInputTag($this->attributes, 'search');
    }
}
