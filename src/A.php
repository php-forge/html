<?php

declare(strict_types=1);

namespace PHPForge\Html;

use PHPForge\Widget\Element;

/**
 * The `<a>` `HTML` element (or anchor element), with its href attribute, creates a hyperlink to web pages, files, email
 * addresses, locations in the same page, or anything else a URL can address.
 *
 * @link https://html.spec.whatwg.org/multipage/text-level-semantics.html#the-a-element
 */
final class A extends Element
{
    use Attribute\Aria\HasAriaControls;
    use Attribute\Aria\HasAriaDisabled;
    use Attribute\Aria\HasAriaExpanded;
    use Attribute\Aria\HasAriaLabel;
    use Attribute\Aria\HasRole;
    use Attribute\CanBeAutofocus;
    use Attribute\CanBeHidden;
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
    use Attribute\Input\HasType;
    use Attribute\Tag\HasDownload;
    use Attribute\Tag\HasHref;
    use Attribute\Tag\HasHreflang;
    use Attribute\Tag\HasPing;
    use Attribute\Tag\HasReferrerpolicy;
    use Attribute\Tag\HasRel;
    use Attribute\Tag\HasTarget;

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
            ->tagName('a')
            ->template($this->template)
            ->render();
    }
}
