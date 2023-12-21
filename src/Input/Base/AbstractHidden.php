<?php

declare(strict_types=1);

namespace PHPForge\Html\Input\Base;

use InvalidArgumentException;
use PHPForge\Html\Attribute;
use PHPForge\Html\Input\HiddenInterface;
use PHPForge\Html\Tag;
use PHPForge\Widget\Element;

use function is_string;
use function sprintf;

abstract class AbstractHidden extends Element implements HiddenInterface
{
    use Attribute\Custom\HasAttributes;
    use Attribute\Custom\HasPrefixAndSuffix;
    use Attribute\Custom\HasTemplate;
    use Attribute\HasId;
    use Attribute\HasStyle;
    use Attribute\Input\HasName;
    use Attribute\Input\HasValue;

    protected array $attributes = [];
    protected string $template = '{prefix}{tag}{suffix}';

    protected function run(): string
    {
        $attributes = $this->attributes;
        $value = $attributes['value'] ?? null;

        /**
         * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.hidden.html#input.hidden.attrs.value
         */
        if ($value !== null && is_string($value) === false) {
            throw new InvalidArgumentException(
                sprintf('%s::class widget must be a string or null value.', static::class)
            );
        }

        return Tag::widget()
            ->attributes($attributes)
            ->id($this->generateId('hidden-'))
            ->prefix($this->prefix)
            ->prefixContainer($this->prefixContainer)
            ->prefixContainerAttributes($this->prefixContainerAttributes)
            ->prefixContainerTag($this->prefixContainerTag)
            ->suffix($this->suffix)
            ->suffixContainer($this->suffixContainer)
            ->suffixContainerAttributes($this->suffixContainerAttributes)
            ->suffixContainerTag($this->suffixContainerTag)
            ->tagName('input')
            ->template($this->template)
            ->type('hidden')
            ->value($value)
            ->render();
    }
}
