<?php

declare(strict_types=1);

namespace PHPForge\Html\Input\Base;

use PHPForge\Html\Attribute;
use PHPForge\Html\Input\InputInterface;
use PHPForge\Html\Tag;
use PHPForge\Widget\Element;

abstract class AbstractHidden extends Element implements InputInterface
{
    use Attribute\Custom\HasAttributes;
    use Attribute\Custom\HasPrefixAndSuffix;
    use Attribute\Custom\HasTemplate;
    use Attribute\Custom\HasWidgetValidation;
    use Attribute\HasId;
    use Attribute\HasStyle;
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

    protected function run(): string
    {
        $this->validateStringValue($this->getValue());

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
