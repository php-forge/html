<?php

declare(strict_types=1);

namespace PHPForge\Html\FormControl\Input\Base;

use PHPForge\{
    Html\Attribute\Aria\HasAriaDescribedBy,
    Html\Attribute\Aria\HasAriaLabel,
    Html\Attribute\CanBeAutofocus,
    Html\Attribute\CanBeHidden,
    Html\Attribute\Custom\HasAttributes,
    Html\Attribute\Custom\HasPrefixCollection,
    Html\Attribute\Custom\HasSuffixCollection,
    Html\Attribute\Custom\HasTemplate,
    Html\Attribute\FormControl\HasFieldAttributes,
    Html\Attribute\FormControl\HasName,
    Html\Attribute\FormControl\Input\HasForm,
    Html\Attribute\HasClass,
    Html\Attribute\HasData,
    Html\Attribute\HasId,
    Html\Attribute\HasLang,
    Html\Attribute\HasStyle,
    Html\Attribute\HasTabindex,
    Html\Attribute\HasTitle,
    Html\Attribute\Input\CanBeDisabled,
    Html\Attribute\Input\CanBeReadonly,
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

    protected array $attributes = [];
    protected string $type = 'text';

    /**
     * This method is used to configure the widget with the provided default definitions.
     */
    protected function loadDefaultDefinitions(): array
    {
        $shortClassName = Utils::getShortNameClass(static::class, false, true);

        return [
            'id()' => [Utils::generateId("$shortClassName-")],
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
            ->prefixContainer($this->prefixContainer)
            ->prefixContainerAttributes($this->prefixContainerAttributes)
            ->prefixContainerTag($this->prefixContainerTag)
            ->suffix($this->suffix)
            ->suffixContainer($this->suffixContainer)
            ->suffixContainerAttributes($this->suffixContainerAttributes)
            ->suffixContainerTag($this->suffixContainerTag)
            ->tagName('input')
            ->template($this->template)
            ->tokenValues($tokenValues)
            ->type($this->type)
            ->render();
    }
}
