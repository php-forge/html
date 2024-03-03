<?php

declare(strict_types=1);

namespace PHPForge\Html\FormControl\Input\Base;

use PHPForge\{
    Html\Attribute\Custom\HasAttributes,
    Html\Attribute\FormControl\HasName,
    Html\Attribute\Global\HasClass,
    Html\Attribute\Global\HasId,
    Html\Attribute\Global\HasStyle,
    Html\Attribute\HasTemplate,
    Html\Attribute\Input\HasValue,
    Html\Helper\Utils,
    Html\Helper\Validator,
    Html\Interop\ValueInterface,
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
        Validator::isString($this->getValue());

        return Tag::widget()->attributes($this->attributes)->tagName('input')->type('hidden')->render();
    }
}
