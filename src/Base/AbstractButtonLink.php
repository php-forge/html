<?php

declare(strict_types=1);

namespace PHPForge\Html\Base;

use PHPForge\Html\Attribute;
use PHPForge\Html\Button;
use PHPForge\Widget\AbstractWidget;

abstract class AbstractButtonLink extends AbstractWidget
{
    use Attribute\Custom\HasContent;
    use Attribute\HasClass;
    use Attribute\HasData;
    use Attribute\HasId;
    use Attribute\HasStyle;
    use Attribute\Input\CanBeDisabled;
    use Attribute\Input\HasName;
    use Attribute\Tag\HasHref;

    protected array $attributes = [];

    protected function run(): string
    {
        $attributes = $this->attributes;
        $button = Button::widget();

        if (isset($attributes['disabled']) && is_bool($attributes['disabled']) && $attributes['disabled']) {
            $button = $button->ariaDisabled('true')->class('disabled');

            unset($attributes['disabled']);
        }

        return $button
            ->attributes($attributes)
            ->content($this->content)
            ->role('button')
            ->tagName('a')
            ->type('link')
            ->render();
    }
}
