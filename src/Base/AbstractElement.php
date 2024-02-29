<?php

declare(strict_types=1);

namespace PHPForge\Html\Base;

use PHPForge\{
    Html\Attribute\Custom\HasAttributes,
    Html\Attribute\Custom\HasPrefixCollection,
    Html\Attribute\Custom\HasSuffixCollection,
    Html\Attribute\Custom\HasTemplate,
    Html\Attribute\HasClass,
    Html\Attribute\HasData,
    Html\Attribute\HasId,
    Html\Attribute\HasLang,
    Html\Attribute\HasStyle,
    Html\Attribute\HasTitle,
    Html\Attribute\Input\HasName,
    Html\HtmlBuilder,
    Html\Interop\RenderInterface,
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
    use HasName;
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
            '{prefix}' => $this->renderPrefixTag(),
            '{tag}' => HtmlBuilder::create($tagName, $content, $this->attributes),
            '{suffix}' => $this->renderSuffixTag(),
        ];
        $tokenTemplateValues += $tokenValues;

        return $this->renderTemplate($this->template, $tokenTemplateValues);
    }
}
