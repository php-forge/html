<?php

declare(strict_types=1);

namespace PHPForge\Html\FormControl\Input\Base;

use PHPForge\{
    Html\Attribute\Aria\HasAriaDescribedBy,
    Html\Attribute\Aria\HasAriaLabel,
    Html\Attribute\Custom\HasAttributes,
    Html\Attribute\Custom\HasContainerCollection,
    Html\Attribute\Custom\HasPrefixCollection,
    Html\Attribute\Custom\HasSuffixCollection,
    Html\Attribute\FormControl\CanBeDisabled,
    Html\Attribute\FormControl\CanBeReadonly,
    Html\Attribute\FormControl\HasForm,
    Html\Attribute\FormControl\HasFormaction,
    Html\Attribute\FormControl\HasFormenctype,
    Html\Attribute\FormControl\HasFormmethod,
    Html\Attribute\FormControl\HasFormnovalidate,
    Html\Attribute\FormControl\HasFormtarget,
    Html\Attribute\FormControl\HasName,
    Html\Attribute\FormControl\Label\CanBeDisableLabel,
    Html\Attribute\FormControl\Label\HasLabel,
    Html\Attribute\FormControl\Label\HasLabelAttributes,
    Html\Attribute\FormControl\Label\HasLabelClass,
    Html\Attribute\FormControl\Label\HasLabelFor,
    Html\Attribute\Global\CanBeAutofocus,
    Html\Attribute\Global\CanBeHidden,
    Html\Attribute\Global\HasClass,
    Html\Attribute\Global\HasData,
    Html\Attribute\Global\HasId,
    Html\Attribute\Global\HasLang,
    Html\Attribute\Global\HasStyle,
    Html\Attribute\Global\HasTabindex,
    Html\Attribute\Global\HasTitle,
    Html\Attribute\HasTemplate,
    Html\Attribute\Input\HasValue,
    Html\FormControl\Label,
    Html\Helper\Utils,
    Html\Helper\Validator,
    Html\Tag,
    Widget\Element
};

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
    use HasFormaction;
    use HasFormenctype;
    use HasFormmethod;
    use HasFormnovalidate;
    use HasFormtarget;
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
        Validator::isString($this->getValue());

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
