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
        $attributes['id'] = $this->id;

        /** @var string|null $type */
        $type = $this->attributes['type'] ?? null;

        return strtr(
            $this->template,
            [
                '{prefix}' => $this->renderPrefix($type),
                '{tag}' => HtmlBuilder::create($this->tagName, $this->content, $attributes),
                '{suffix}' => $this->renderSuffix($type),
            ],
        );
    }

    private function renderPrefix(string $type = null): string
    {
        $prefix = $this->prefix;

        if ($prefix !== '' && $type !== 'checkbox' && $type !== 'radio') {
            $prefix .= PHP_EOL;
        }

        return match ($this->prefixContainer) {
            true => Tag::widget()
                ->attributes($this->prefixContainerAttributes)
                ->content($this->prefix)
                ->tagName($this->prefixContainerTag)
                ->render() . PHP_EOL,
            default => $prefix,
        };
    }

    private function renderSuffix(string $type = null): string
    {
        $suffix = $this->suffix;

        if ($suffix !== '' && $type !== 'checkbox' && $type !== 'radio') {
            $suffix = PHP_EOL . $suffix;
        }

        return match ($this->suffixContainer) {
            true => Tag::widget()
                ->attributes($this->suffixContainerAttributes)
                ->content($this->suffix)
                ->tagName($this->suffixContainerTag)
                ->render(),
            default => $suffix,
        };
    }
}
