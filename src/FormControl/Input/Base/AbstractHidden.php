<?php

declare(strict_types=1);

namespace PHPForge\Html\FormControl\Input\Base;

use PHPForge\Html\Attribute\Custom\{HasAttributes, HasTemplate, HasWidgetValidation};
use PHPForge\Html\Attribute\Input\{HasName, HasValue};
use PHPForge\Html\Attribute\{HasClass, HasId, HasStyle};
use PHPForge\Html\FormControl\Input\Contract\ValueInterface;
use PHPForge\Html\Tag;
use PHPForge\Widget\Element;

abstract class AbstractHidden extends Element implements ValueInterface
{
    use HasAttributes;
    use HasClass;
    use HasId;
    use HasName;
    use HasStyle;
    use HasTemplate;
    use HasValue;
    use HasWidgetValidation;

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
