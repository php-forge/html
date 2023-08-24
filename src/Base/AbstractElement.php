<?php

declare(strict_types=1);

namespace PHPForge\Html\Base;

use PHPForge\Html\Attribute;
use PHPForge\Html\HtmlBuilder;
use PHPForge\Widget\Element;

abstract class AbstractElement extends Element
{
    use Attribute\Custom\HasAttributes;
    use Attribute\Custom\HasContent;
    use Attribute\HasClass;
    use Attribute\HasId;
    use Attribute\HasLang;
    use Attribute\HasStyle;
    use Attribute\HasTitle;

    protected array $attributes = [];
    protected string $tagName = '';

    protected function run(): string
    {
        return HtmlBuilder::create($this->tagName, $this->content, $this->attributes);
    }
}
