<?php

declare(strict_types=1);

namespace PHPForge\Html\Base;

use PHPForge\Html\Attribute;
use PHPForge\Html\HtmlBuilder;
use PHPForge\Widget\Block;

/**
 * Provides a foundation for creating HTML block elements with various attributes and content.
 */
abstract class AbstractBlockElement extends Block
{
    use Attribute\Custom\HasAttributes;
    use Attribute\Custom\HasContent;
    use Attribute\HasClass;
    use Attribute\HasId;
    use Attribute\HasLang;
    use Attribute\HasStyle;
    use Attribute\HasTitle;
    use Attribute\Input\HasName;

    protected array $attributes = [];
    protected string $tagName = '';

    /**
     * Begin rendering the block element.
     *
     * @return string The opening tag of the block element.
     */
    public function begin(): string
    {
        parent::begin();

        return HtmlBuilder::begin($this->tagName, $this->attributes);
    }

    /**
     * Generate the HTML representation of the element.
     *
     * @return string The HTML representation of the element.
     */
    protected function run(): string
    {
        return match ($this->isBeginExecuted()) {
            false => HtmlBuilder::create($this->tagName, $this->content, $this->attributes),
            default => HtmlBuilder::end($this->tagName),
        };
    }
}
