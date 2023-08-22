<?php

declare(strict_types=1);

namespace PHPForge\Html\Base;

use PHPForge\Html\Attribute;
use PHPForge\Html\Button;
use PHPForge\Html\Helper\CssClass;
use PHPForge\Widget\AbstractWidget;

abstract class AbstractButtonLink extends AbstractWidget
{
    use Attribute\Custom\HasContent;
    use Attribute\HasClass;
    use Attribute\Input\CanBeDisabled;
    use Attribute\Tag\HasHref;

    protected array $attributes = [];

    protected function run(): string
    {
        $attributes = $this->attributes;
        $attributes['role'] = 'button';
        $attributes['type'] = 'link';

        if (isset($attributes['disabled']) && is_bool($attributes['disabled']) && $attributes['disabled']) {
            CssClass::add($attributes, 'disabled');
            $attributes['aria-disabled'] = 'true';

            unset($attributes['disabled']);
        }

        return Button::widget()->attributes($attributes)->content($this->content)->tagName('a')->render();
    }
}
