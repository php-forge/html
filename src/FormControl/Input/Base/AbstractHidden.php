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
    Html\Tag
};
use PHPForge\Widget\Element;

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

    protected function run(): string
    {
        $this->validateString($this->getValue());

        return Tag::widget()
            ->attributes($this->attributes)
            ->id($this->generateId('hidden-'))
            ->tagName('input')
            ->type('hidden')
            ->render();
    }
}
