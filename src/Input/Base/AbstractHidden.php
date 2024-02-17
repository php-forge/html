<?php

declare(strict_types=1);

namespace PHPForge\Html\Input\Base;

use PHPForge\Html\Attribute\Custom\{HasAttributes, HasPrefixAndSuffix, HasTemplate, HasWidgetValidation};
use PHPForge\Html\Attribute\Input\{HasName, HasValue};
use PHPForge\Html\Attribute\{HasClass, HasId, HasStyle};
use PHPForge\Html\Input\Contract\ValueInterface;
use PHPForge\Html\Tag;
use PHPForge\Widget\Element;

abstract class AbstractHidden extends Element implements ValueInterface
{
    use HasAttributes;
    use HasClass;
    use HasId;
    use HasName;
    use HasPrefixAndSuffix;
    use HasStyle;
    use HasTemplate;
    use HasValue;
    use HasWidgetValidation;

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

    protected function run(): string
    {
        $this->validateString($this->getValue());

        return Tag::widget()
            ->attributes($this->attributes)
            ->id($this->generateId('hidden-'))
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
            ->type('hidden')
            ->render();
    }
}
