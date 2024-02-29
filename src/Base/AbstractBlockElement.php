<?php

declare(strict_types=1);

namespace PHPForge\Html\Base;

use PHPForge\Html\{
    Attribute\Custom\HasAttributes,
    Attribute\Custom\HasContent,
    Attribute\HasClass,
    Attribute\HasData,
    Attribute\HasId,
    Attribute\HasLang,
    Attribute\HasStyle,
    Attribute\HasTitle,
    Attribute\Input\HasName,
    HtmlBuilder
};
use PHPForge\Widget\Block;

/**
 * Provides a foundation for creating HTML block elements with various attributes and content.
 */
abstract class AbstractBlockElement extends Block
{
    use HasAttributes;
    use HasClass;
    use HasContent;
    use HasData;
    use HasId;
    use HasLang;
    use HasName;
    use HasStyle;
    use HasTitle;

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
        if ($this->isBeginExecuted() === false) {

            return HtmlBuilder::create($this->tagName, $this->content, $this->attributes);
        }

        return HtmlBuilder::end($this->tagName);
    }
}
