<?php

declare(strict_types=1);

namespace PHPForge\Html\Base;

use PHPForge\Html\Attribute;
use PHPForge\Html\HtmlBuilder;
use PHPForge\Html\Tag;
use PHPForge\Widget\Element;

/**
 * Provides a foundation for creating HTML elements with various attributes and content.
 */
abstract class AbstractElement extends Element
{
    use Attribute\Custom\HasAttributes;
    use Attribute\Custom\HasContent;
    use Attribute\Custom\HasPrefixAndSuffix;
    use Attribute\Custom\HasTemplate;
    use Attribute\HasClass;
    use Attribute\HasData;
    use Attribute\HasId;
    use Attribute\HasLang;
    use Attribute\HasStyle;
    use Attribute\HasTabindex;
    use Attribute\HasTitle;
    use Attribute\Input\HasName;

    protected array $attributes = [];
    protected string $tagName = '';
    protected string $template = '{prefix}{tag}{suffix}';

    /**
     * Generate the HTML representation of the element.
     *
     * @return string The HTML representation of the element.
     */
    protected function run(): string
    {
        $attributes = $this->attributes;

        if (array_key_exists('id', $attributes) === false) {
            $attributes['id'] = $this->id;
        }

        return strtr(
            $this->template,
            [
                '{prefix}' => $this->renderPrefix(),
                '{tag}' => HtmlBuilder::create($this->tagName, $this->content, $attributes),
                '{suffix}' => $this->renderSuffix(),
            ],
        );
    }

    private function renderPrefix(): string
    {
        return match ($this->prefixContainer) {
            true => Tag::widget()
                ->attributes($this->prefixContainerAttributes)
                ->content($this->prefix)
                ->tagName($this->prefixContainerTag)
                ->render() . PHP_EOL,
            default => $this->prefix !== '' ? $this->prefix . PHP_EOL : '',
        };
    }

    private function renderSuffix(): string
    {
        return match ($this->suffixContainer) {
            true => PHP_EOL . Tag::widget()
                ->attributes($this->suffixContainerAttributes)
                ->content($this->suffix)
                ->tagName($this->suffixContainerTag)
                ->render(),
            default => $this->suffix !== '' ? PHP_EOL . $this->suffix : '',
        };
    }
}
