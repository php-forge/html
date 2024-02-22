<?php

declare(strict_types=1);

namespace PHPForge\Html\FormControl\Input\Base;

use PHPForge\Html\{
    Attribute\Aria\HasAriaDescribedBy,
    Attribute\Aria\HasAriaLabel,
    Attribute\CanBeAutofocus,
    Attribute\CanBeHidden,
    Attribute\Custom\HasAttributes,
    Attribute\Custom\HasPrefixAndSuffixCollection,
    Attribute\Custom\HasTemplate,
    Attribute\Field\HasGenerateField,
    Attribute\HasClass,
    Attribute\HasData,
    Attribute\HasId,
    Attribute\HasLang,
    Attribute\HasStyle,
    Attribute\HasTabindex,
    Attribute\HasTitle,
    Attribute\Input\CanBeDisabled,
    Attribute\Input\CanBeReadonly,
    Attribute\Input\HasForm,
    Attribute\Input\HasName,
    FormControl\Input\Contract\AriaDescribedByInterface,
    FormControl\Input\Contract\InputInterface,
    Tag
};
use PHPForge\Widget\Element;

/**
 * Provides a foundation for creating HTML `input` custom elements with various attributes and content.
 */
abstract class AbstractInput extends Element implements AriaDescribedByInterface, InputInterface
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
    use HasForm;
    use HasGenerateField;
    use HasId;
    use HasLang;
    use HasName;
    use HasPrefixAndSuffixCollection;
    use HasStyle;
    use HasTabindex;
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

    protected function buildInputTag(
        array $attributes,
        string $type,
        array $tokenValues = [],
        string $name = ''
    ): string {
        $id = $this->generateId("$type-");

        if ($id === null) {
            unset($attributes['id']);
        }

        if ($this->ariaDescribedBy === true) {
            $attributes['aria-describedby'] = "$id-help";
        }

        unset($attributes['type']);

        return Tag::widget()
            ->attributes($attributes)
            ->id($id)
            ->name($name)
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
            ->type($type)
            ->render();
    }
}
