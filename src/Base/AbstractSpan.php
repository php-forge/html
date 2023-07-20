<?php

declare(strict_types=1);

namespace PHPForge\Html\Base;

use PHPForge\Html\Attribute;
use PHPForge\Html\Tag;
use PHPForge\Widget\AbstractWidget;

/**
 * This is an abstract class that extends AbstractWidget and serves as a base for generating the <span> tag.
 * The <span> tag is an inline HTML element used to group inline-elements and apply styles to them.
 * Concrete classes should extend this class to implement specific <span> tag variations and their generation logic.
 *
 * @package PHPForge\Html\Base
 */
abstract class AbstractSpan extends AbstractWidget
{
    use Attribute\Custom\HasAttributes;
    use Attribute\Custom\HasContent;
    use Attribute\HasClass;
    use Attribute\HasId;
    use Attribute\HasTitle;

    protected array $attributes = [];

    protected function run(): string
    {
        return Tag::widget()->attributes($this->attributes)->content($this->content)->tagName('span')->render();
    }
}
