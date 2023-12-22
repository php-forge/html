<?php

declare(strict_types=1);

namespace PHPForge\Html\Input\Base;

use InvalidArgumentException;
use PHPForge\Html\Attribute;
use PHPForge\Html\Input\PlaceholderInterface;
use PHPForge\Html\Input\RuleHtmlByAttributeInterface;

use function is_string;
use function sprintf;

abstract class AbstractText extends AbstractInput implements PlaceholderInterface, RuleHtmlByAttributeInterface
{
    use Attribute\Input\CanBeRequired;
    use Attribute\Input\HasDirname;
    use Attribute\Input\HasMaxLength;
    use Attribute\Input\HasMinLength;
    use Attribute\Input\HasPattern;
    use Attribute\Input\HasPlaceholder;
    use Attribute\Input\HasSize;

    protected function run(): string
    {
        $value = $this->getValue();

        /**
         * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.text.html#input.text.attrs.value
         */
        if ($value !== null && is_string($value) === false) {
            throw new InvalidArgumentException(
                sprintf('%s::class widget must be a string or null value.', static::class)
            );
        }

        return $this->buildInputTag($this->attributes, 'text')->render();
    }
}
