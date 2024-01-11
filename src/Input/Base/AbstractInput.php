<?php

declare(strict_types=1);

namespace PHPForge\Html\Input\Base;

use PHPForge\Html\{Attribute, Tag};
use PHPForge\Html\Input\Contract\{AriaDescribedByInterface, InputInterface, ValueInterface};
use PHPForge\Widget\Element;

/**
 * Provides a foundation for creating HTML `input` custom elements with various attributes and content.
 */
abstract class AbstractInput extends Element implements AriaDescribedByInterface, InputInterface, ValueInterface
{
    use Attribute\Aria\HasAriaDescribedBy;
    use Attribute\Aria\HasAriaLabel;
    use Attribute\CanBeAutofocus;
    use Attribute\CanBeHidden;
    use Attribute\Custom\HasAttributes;
    use Attribute\Custom\HasPrefixAndSuffix;
    use Attribute\Custom\HasTemplate;
    use Attribute\HasClass;
    use Attribute\HasData;
    use Attribute\HasId;
    use Attribute\HasLang;
    use Attribute\HasStyle;
    use Attribute\HasTabindex;
    use Attribute\HasTitle;
    use Attribute\Input\CanBeDisabled;
    use Attribute\Input\CanBeReadonly;
    use Attribute\Input\HasForm;
    use Attribute\Input\HasName;
    use Attribute\Input\HasValue;

    protected array $attributes = [];

    /**
     * This method is used to configure the widget with the provided default definitions.
     */
    public function loadDefaultDefinitions(): array
    {
        return [
            'template()' => ['{prefix}\n{tag}\n{suffix}'],
        ];
    }

    protected function buildInputTag(array $attributes, string $type): string
    {
        $id = $this->generateId("$type-");

        if ($this->ariaDescribedBy === true) {
            $attributes['aria-describedby'] = "$id-help";
        }

        unset($attributes['type']);

        return Tag::widget()
            ->attributes($attributes)
            ->id($id)
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
            ->type($type)
            ->render();
    }
}
