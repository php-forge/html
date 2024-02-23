<?php

declare(strict_types=1);

namespace PHPForge\Html\FormControl\Input\Base;

use PHPForge\Html\{
    Attribute\Aria\HasAriaDescribedBy,
    Attribute\Aria\HasAriaLabel,
    Attribute\CanBeAutofocus,
    Attribute\CanBeHidden,
    Attribute\Custom\HasAttributes,
    Attribute\Custom\HasContainerCollection,
    Attribute\Custom\HasLabelCollection,
    Attribute\Custom\HasPrefixCollection,
    Attribute\Custom\HasSuffixCollection,
    Attribute\Custom\HasTemplate,
    Attribute\Custom\HasValidateString,
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
    Attribute\Input\HasValue,
    Tag
};
use PHPForge\Widget\Element;

abstract class AbstractButton extends Element
{
    use CanBeAutofocus;
    use CanBeDisabled;
    use CanBeHidden;
    use CanBeReadonly;
    use HasAriaDescribedBy;
    use HasAriaLabel;
    use HasAttributes;
    use HasClass;
    use HasContainerCollection;
    use HasData;
    use HasForm;
    use HasId;
    use HasLabelCollection;
    use HasLang;
    use HasName;
    use HasPrefixCollection;
    use HasStyle;
    use HasSuffixCollection;
    use HasTabindex;
    use HasTemplate;
    use HasTitle;
    use HasValidateString;
    use HasValue;

    protected array $attributes = [];
    protected string $type = 'button';

    /**
     * This method is used to configure the widget with the provided default definitions.
     */
    protected function loadDefaultDefinitions(): array
    {
        return [
            'container()' => [true],
            'id()' => [$this->generateId('button-')],
            'template()' => ['{prefix}\n{label}\n{tag}\n{suffix}'],
        ];
    }

    protected function run(): string
    {
        $this->validateString($this->getValue());

        $attributes = $this->attributes;
        $labelFor = $this->labelFor ?? $this->id;

        if ($this->ariaDescribedBy === true) {
            $attributes['aria-describedby'] = "$this->id-help";
        }

        return $this->renderContainerTag(
            null,
            Tag::widget()
                ->attributes($attributes)
                ->id($this->id)
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
                ->type($this->type)
                ->tokenValues(['{label}' => $this->renderLabelTag($labelFor)])
                ->render()
        );
    }
}
