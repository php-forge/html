<?php

declare(strict_types=1);

namespace PHPForge\Html\FormControl\Input\Base;

use PHPForge\{
    Html\Attribute\Aria\HasAriaDescribedBy,
    Html\Attribute\Aria\HasAriaLabel,
    Html\Attribute\CanBeAutofocus,
    Html\Attribute\CanBeHidden,
    Html\Attribute\Custom\HasAttributes,
    Html\Attribute\Custom\HasContainerCollection,
    Html\Attribute\Custom\HasLabelCollection,
    Html\Attribute\Custom\HasPrefixCollection,
    Html\Attribute\Custom\HasSuffixCollection,
    Html\Attribute\Custom\HasTemplate,
    Html\Attribute\Custom\HasValidateString,
    Html\Attribute\HasClass,
    Html\Attribute\HasData,
    Html\Attribute\HasId,
    Html\Attribute\HasLang,
    Html\Attribute\HasStyle,
    Html\Attribute\HasTabindex,
    Html\Attribute\HasTitle,
    Html\Attribute\Input\CanBeDisabled,
    Html\Attribute\Input\CanBeReadonly,
    Html\Attribute\Input\HasForm,
    Html\Attribute\Input\HasName,
    Html\Attribute\Input\HasValue,
    Html\Helper\Utils,
    Html\Tag,
    Widget\Element
};

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
            'id()' => [Utils::generateId('button-')],
            'template()' => ['{prefix}\n{label}\n{tag}\n{suffix}'],
        ];
    }

    protected function run(): string
    {
        $this->validateString($this->getValue());

        $attributes = $this->attributes;
        $id = $this->getId();
        $labelFor = $this->labelFor ?? $id;

        if ($this->ariaDescribedBy === true) {
            $attributes['aria-describedby'] = "$id-help";
        }

        return $this->renderContainerTag(
            null,
            Tag::widget()
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
                ->type($this->type)
                ->tokenValues(['{label}' => $this->renderLabelTag($labelFor)])
                ->render()
        );
    }
}
