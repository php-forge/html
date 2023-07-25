<?php

declare(strict_types=1);

namespace PHPForge\Html\Base;

use PHPForge\Html\Attribute;
use PHPForge\Html\HtmlBuilder;
use PHPForge\Widget\AbstractWidget;

abstract class AbstractBlockElement extends AbstractWidget
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
    private bool $block = false;

    public function begin(): string
    {
        $this->block = true;

        parent::begin();

        return HtmlBuilder::begin($this->tagName, $this->attributes);
    }

    protected function run(): string
    {
        return match ($this->block) {
            false => HtmlBuilder::create($this->tagName, $this->content, $this->attributes),
            default => HtmlBuilder::end($this->tagName),
        };
    }
}