<?php

declare(strict_types=1);

namespace PHPForge\Html\Base;

use PHPForge\Html\Attribute;
use PHPForge\Html\HtmlBuilder;
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
    use Attribute\HasTitle;
    use Attribute\Input\HasName;

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
     * @param array $tokenValues The token values to be used in the template.
     *
     * @return string The HTML representation of the element.
     */
    protected function buildElement(string $tagName, array $tokenValues = []): string
    {
        $attributes = $this->attributes;
        $attributes['id'] ??= $this->id;

        $tokenTemplateValues = [
            '{prefix}' => $this->renderPrefixTag(),
            '{tag}' => HtmlBuilder::create($tagName, $this->content, $attributes),
            '{suffix}' => $this->renderSuffixTag(),
        ];
        $tokenTemplateValues += $tokenValues;

        return $this->renderTemplate($this->template, $tokenTemplateValues);
    }
}
