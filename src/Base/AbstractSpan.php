<?php

declare(strict_types=1);

namespace PHPForge\Html\Base;

use PHPForge\Html\Attribute;
use PHPForge\Html\HtmlBuilder;
use PHPForge\Widget\AbstractWidget;

/**
 * This is an abstract class that extends AbstractWidget and serves as a base for generating the `<span>` tag.
 * The `<span>` tag is an inline HTML element used to group inline-elements and apply styles to them.
 * Concrete classes should extend this class to implement specific `<span>` tag variations and their generation logic.
 */
abstract class AbstractSpan extends AbstractWidget
{
    use Attribute\HasClass;
    use Attribute\HasId;
    use Attribute\HasTitle;
    use Attribute\Custom\HasAttributes;
    use Attribute\Custom\HasContent;

    protected array $attributes = [];

    protected function run(): string
    {
        return HtmlBuilder::create('span', $this->content, $this->attributes);
    }
}
