<?php

declare(strict_types=1);

namespace PHPForge\Html\Base;

use PHPForge\{
    Html\Attribute\Custom\HasAttributes,
    Html\Attribute\Custom\HasPrefixCollection,
    Html\Attribute\Custom\HasSuffixCollection,
    Html\Attribute\Global\HasClass,
    Html\Attribute\Global\HasData,
    Html\Attribute\Global\HasId,
    Html\Attribute\Global\HasLang,
    Html\Attribute\Global\HasStyle,
    Html\Attribute\Global\HasTitle,
    Html\Attribute\HasTemplate,
    Html\Helper\Template,
    Html\HtmlBuilder,
    Html\Interop\RenderInterface,
    Html\Tag,
    Widget\Element
};

/**
 * Provides a foundation for creating HTML elements with various attributes and content.
 */
abstract class AbstractElement extends Element implements RenderInterface
{
    use HasAttributes;
    use HasClass;
    use HasData;
    use HasId;
    use HasLang;
    use HasPrefixCollection;
    use HasStyle;
    use HasSuffixCollection;
    use HasTemplate;
    use HasTitle;

    protected array $attributes = [];

    /**
     * This method is used to configure the widget with the provided default definitions.
     */
    protected function loadDefaultDefinitions(): array
    {
        return [
            'template()' => ['{prefix}\n{tag}\n{suffix}'],
        ];
    }

    /**
     * Generate the HTML representation of the element.
     *
     * @param string $tagName The tag name of the element.
     * @param string $content The content of the element.
     * @param array $tokenValues The token values to be used in the template.
     *
     * @return string The HTML representation of the element.
     */
    protected function buildElement(string $tagName, string $content = '', array $tokenValues = []): string
    {
        $tokenTemplateValues = [
            '{prefix}' => $this->renderTag(
                $this->prefixContainerAttributes,
                $this->prefixContainer,
                $this->prefix,
                $this->prefixContainerTag
            ),
            '{tag}' => HtmlBuilder::create($tagName, $content, $this->attributes),
            '{suffix}' => $this->renderTag(
                $this->suffixContainerAttributes,
                $this->suffixContainer,
                $this->suffix,
                $this->suffixContainerTag
            ),
        ];
        $tokenTemplateValues += $tokenValues;

        return Template::render($this->template, $tokenTemplateValues);
    }

    private function renderTag(array $attributes, bool $container, string $content, string $tag): string
    {
        return match ($container) {
            true => Tag::widget()->attributes($attributes)->content($content)->tagName($tag)->render(),
            false => $content,
        };
    }
}
