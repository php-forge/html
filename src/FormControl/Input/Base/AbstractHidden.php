<?php

declare(strict_types=1);

namespace PHPForge\Html\FormControl\Input\Base;

use PHPForge\{
    Html\Attribute\Custom\HasAttributes,
    Html\Attribute\Custom\HasTemplate,
    Html\Attribute\Custom\HasValidateString,
    Html\Attribute\HasClass,
    Html\Attribute\HasId,
    Html\Attribute\HasStyle,
    Html\Attribute\Input\HasName,
    Html\Attribute\Input\HasValue,
    Html\Interop\ValueInterface,
    Html\Helper\Utils,
    Html\Tag,
    Widget\Element
};

abstract class AbstractHidden extends Element implements ValueInterface
{
    use HasAttributes;
    use HasClass;
    use HasId;
    use HasName;
    use HasStyle;
    use HasTemplate;
    use HasValidateString;
    use HasValue;

    protected array $attributes = [];

    /**
     * This method is used to configure the widget with the provided default definitions.
     */
    protected function loadDefaultDefinitions(): array
    {
        return [
            'id()' => [Utils::generateId('hidden-')],
        ];
    }

    protected function run(): string
    {
        $this->validateString($this->getValue());

        return Tag::widget()->attributes($this->attributes)->tagName('input')->type('hidden')->render();
    }
}
