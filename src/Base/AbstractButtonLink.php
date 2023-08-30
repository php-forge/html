<?php

declare(strict_types=1);

namespace PHPForge\Html\Base;

use PHPForge\Html\A;
use PHPForge\Html\Attribute;
use PHPForge\Widget\Element;

/**
 * Provides a foundation for creating HTML `button` link elements with various attributes and content.
 */
abstract class AbstractButtonLink extends Element
{
    use Attribute\Custom\HasAttributes;
    use Attribute\Custom\HasContent;
    use Attribute\HasClass;
    use Attribute\HasData;
    use Attribute\HasId;
    use Attribute\HasStyle;
    use Attribute\HasTitle;
    use Attribute\Input\CanBeDisabled;
    use Attribute\Input\HasName;
    use Attribute\Tag\HasHref;

    protected array $attributes = [];

    /**
     * Generate the HTML representation of the element.
     *
     * @return string The HTML representation of the element.
     */
    protected function run(): string
    {
        $attributes = $this->attributes;
        $a = A::widget();

        if (isset($attributes['disabled']) && is_bool($attributes['disabled']) && $attributes['disabled']) {
            $a = $a->ariaDisabled('true')->class('disabled');

            unset($attributes['disabled']);
        }

        return $a->attributes($attributes)->content($this->content)->role('button')->render();
    }
}
