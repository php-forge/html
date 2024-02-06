<?php

declare(strict_types=1);

namespace PHPForge\Html;

use PHPForge\Widget\Element;

/**
 * The `<i>` HTML element represents a range of text that's set off from the normal text for some reason, such as
 * an idiomatic text, technical terms, taxonomic designations, among others.
 *
 * @link https://html.spec.whatwg.org/multipage/text-level-semantics.html#the-i-element
 */
final class I extends Element
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

    private array $attributes = [];

    /**
     * This method is used to configure the widget with the provided default definitions.
     */
    protected function loadDefaultDefinitions(): array
    {
        return [
            'template()' => ['{prefix}\n{tag}\n{suffix}'],
        ];
    }

    protected function run(): string
    {
        return Tag::widget()
            ->attributes($this->attributes)
            ->content($this->content)
            ->id($this->id)
            ->prefix($this->prefix)
            ->prefixContainer($this->prefixContainer)
            ->prefixContainerAttributes($this->prefixContainerAttributes)
            ->prefixContainerTag($this->prefixContainerTag)
            ->suffix($this->suffix)
            ->suffixContainer($this->suffixContainer)
            ->suffixContainerAttributes($this->suffixContainerAttributes)
            ->suffixContainerTag($this->suffixContainerTag)
            ->tagName('i')
            ->template($this->template)
            ->render();
    }
}
