<?php

declare(strict_types=1);

namespace PHPForge\Html\Base;

use PHPForge\Html\Attribute;
use PHPForge\Html\HtmlBuilder;
use PHPForge\Widget\AbstractWidget;

/**
 * This is an abstract class that extends AbstractWidget and serves as a base for generating various HTML tags.
 * Concrete classes should extend this class to implement specific HTML tags and their generation logic.
 */
abstract class AbstractTag extends AbstractWidget
{
    use Attribute\HasClass;
    use Attribute\HasId;
    use Attribute\Custom\HasAttributes;
    use Attribute\Custom\HasContent;
    use Attribute\Custom\HasTagName;

    protected array $attributes = [];
    private bool $block = false;
    private string $tagName = '';

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
