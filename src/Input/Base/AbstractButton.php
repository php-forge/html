<?php

declare(strict_types=1);

namespace PHPForge\Html\Input\Base;

use PHPForge\Html\Attribute\Aria\{HasAriaDescribedBy, HasAriaLabel};
use PHPForge\Html\Attribute\Custom\{
    HasAttributes,
    HasContainer,
    HasLabel,
    HasPrefixAndSuffix,
    HasTemplate,
    HasWidgetValidation
};
use PHPForge\Html\Attribute\Input\{CanBeDisabled, CanBeReadonly, HasForm, HasName, HasValue};
use PHPForge\Html\Attribute\{
    CanBeAutofocus,
    CanBeHidden,
    HasClass,
    HasData,
    HasId,
    HasLang,
    HasStyle,
    HasTabindex,
    HasTitle
};
use PHPForge\Html\Tag;
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
    use HasContainer;
    use HasData;
    use HasForm;
    use HasId;
    use HasLabel;
    use HasLang;
    use HasName;
    use HasPrefixAndSuffix;
    use HasStyle;
    use HasTabindex;
    use HasTemplate;
    use HasTitle;
    use HasValue;
    use HasWidgetValidation;

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
