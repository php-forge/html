<?php

declare(strict_types=1);

namespace PHPForge\Html\FormControl\Input\Base;

use PHPForge\{
    Html\Attribute\Aria\HasAriaDescribedBy,
    Html\Attribute\Aria\HasAriaLabel,
    Html\Attribute\FormControl\CanBeDisabled,
    Html\Attribute\FormControl\CanBeReadonly,
    Html\Attribute\FormControl\HasFieldAttributes,
    Html\Attribute\FormControl\HasForm,
    Html\Attribute\FormControl\HasName,
    Html\Attribute\Global\CanBeAutofocus,
    Html\Attribute\Global\CanBeHidden,
    Html\Attribute\Global\HasClass,
    Html\Attribute\Global\HasData,
    Html\Attribute\Global\HasId,
    Html\Attribute\Global\HasLang,
    Html\Attribute\Global\HasStyle,
    Html\Attribute\Global\HasTabindex,
    Html\Attribute\Global\HasTitle,
    Html\Attribute\HasAttributes,
    Html\Attribute\HasPrefixCollection,
    Html\Attribute\HasSuffixCollection,
    Html\Attribute\HasTemplate,
    Html\Helper\Utils,
    Html\Interop\AriaDescribedByInterface,
    Html\Interop\InputInterface,
    Html\Interop\RenderInterface,
    Html\Tag,
    Widget\Element
};

/**
 * Provides a foundation for creating HTML `input` custom elements with various attributes and content.
 */
abstract class AbstractInput extends Element implements AriaDescribedByInterface, InputInterface, RenderInterface
{
    use CanBeAutofocus;
    use CanBeDisabled;
    use CanBeHidden;
    use CanBeReadonly;
    use HasAriaDescribedBy;
    use HasAriaLabel;
    use HasAttributes;
    use HasClass;
    use HasData;
    use HasFieldAttributes;
    use HasForm;
    use HasId;
    use HasLang;
    use HasName;
    use HasPrefixCollection;
    use HasStyle;
    use HasSuffixCollection;
    use HasTabindex;
    use HasTemplate;
    use HasTitle;

    protected string $type = 'text';

    /**
     * This method is used to configure the widget with the provided default definitions.
     */
    protected function loadDefaultDefinitions(): array
    {
        $shortClassName = Utils::getShortNameClass(static::class, false, true);

        return [
            'id()' => [Utils::generateId("$shortClassName-")],
            'prefixTag()' => [false],
            'suffixTag()' => [false],
            'template()' => ['{prefix}\n{tag}\n{suffix}'],
        ];
    }

    protected function renderInputTag(array $attributes, array $tokenValues = []): string
    {
        $id = $this->getId();

        if ($this->ariaDescribedBy === true && $id !== null) {
            $attributes['aria-describedby'] = "$id-help";
        }

        return Tag::widget()
            ->attributes($attributes)
            ->prefix($this->prefix)
            ->prefixAttributes($this->prefixAttributes)
            ->prefixTag($this->prefixTag)
            ->suffix($this->suffix)
            ->suffixAttributes($this->suffixAttributes)
            ->suffixTag($this->suffixTag)
            ->tagName('input')
            ->template($this->template)
            ->tokenValues($tokenValues)
            ->type($this->type)
            ->render();
    }
}
