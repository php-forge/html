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
    Html\Attribute\Custom\HasPrefixCollection,
    Html\Attribute\Custom\HasSuffixCollection,
    Html\Attribute\Custom\HasTemplate,
    Html\Attribute\Custom\HasValidateString,
    Html\Attribute\FormControl\HasName,
    Html\Attribute\FormControl\Input\HasForm,
    Html\Attribute\FormControl\Label\CanBeDisableLabel,
    Html\Attribute\FormControl\Label\HasLabel,
    Html\Attribute\FormControl\Label\HasLabelAttributes,
    Html\Attribute\FormControl\Label\HasLabelClass,
    Html\Attribute\FormControl\Label\HasLabelFor,
    Html\Attribute\HasClass,
    Html\Attribute\HasData,
    Html\Attribute\HasId,
    Html\Attribute\HasLang,
    Html\Attribute\HasStyle,
    Html\Attribute\HasTabindex,
    Html\Attribute\HasTitle,
    Html\Attribute\Input\CanBeDisabled,
    Html\Attribute\Input\CanBeReadonly,
    Html\Attribute\Input\HasValue,
    Html\Helper\Utils,
    Html\Tag,
    Widget\Element
};
use PHPForge\Html\FormControl\Label;

abstract class AbstractButton extends Element
{
    use CanBeAutofocus;
    use CanBeDisabled;
    use CanBeDisableLabel;
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
    use HasLabel;
    use HasLabelAttributes;
    use HasLabelClass;
    use HasLabelFor;
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

        $id = $this->getId();

        $attributes = $this->attributes;
        $label = '';

        if ($this->ariaDescribedBy === true && $id !== null) {
            $attributes['aria-describedby'] = "$id-help";
        }

        if ($this->disableLabel === false) {
            $label = Label::widget()
                ->attributes($this->labelAttributes)
                ->content($this->label)
                ->for($this->labelFor ?? $id);
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
                ->tokenValues(['{label}' => $label])
                ->render()
        );
    }
}
