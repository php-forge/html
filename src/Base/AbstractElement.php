<?php

declare(strict_types=1);

namespace PHPForge\Html\Base;

use PHPForge\Html\{
    Attribute\Custom\HasAttributes,
    Attribute\Custom\HasPrefixCollection,
    Attribute\Custom\HasSuffixCollection,
    Attribute\Custom\HasTemplate,
    Attribute\HasClass,
    Attribute\HasData,
    Attribute\HasId,
    Attribute\HasLang,
    Attribute\HasStyle,
    Attribute\HasTitle,
    Attribute\Input\HasName,
    HtmlBuilder
};
use PHPForge\Widget\Element;

/**
 * Provides a foundation for creating HTML elements with various attributes and content.
 */
abstract class AbstractElement extends Element
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
        $attributes = $this->attributes;
        $attributes['id'] ??= $this->id;

        $tokenTemplateValues = [
            '{prefix}' => $this->renderPrefixTag(),
            '{tag}' => HtmlBuilder::create($tagName, $content, $attributes),
            '{suffix}' => $this->renderSuffixTag(),
        ];
        $tokenTemplateValues += $tokenValues;

        return $this->renderTemplate($this->template, $tokenTemplateValues);
    }
}
