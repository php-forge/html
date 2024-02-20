<?php

declare(strict_types=1);

namespace PHPForge\Html\FormControl\Input\Base;

use PHPForge\Html\Attribute\Aria\{HasAriaDescribedBy, HasAriaLabel};
use PHPForge\Html\Attribute\Custom\{HasAttributes, HasPrefixAndSuffix, HasTemplate};
use PHPForge\Html\Attribute\Field\HasGenerateField;
use PHPForge\Html\Attribute\Input\{CanBeDisabled, CanBeReadonly, HasForm, HasName};
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
use PHPForge\Html\FormControl\Input\Contract\{AriaDescribedByInterface, InputInterface};
use PHPForge\Html\Tag;
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
    use HasPrefixAndSuffix;
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
