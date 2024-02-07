<?php

declare(strict_types=1);

namespace PHPForge\Html\Base;

use PHPForge\Html\Attribute;
use PHPForge\Html\Helper\Encode;
use PHPForge\Html\Tag;
use PHPForge\Widget\Element;

/**
 * Provides a foundation for creating HTML `meta` elements with various attributes and content.
 */
abstract class AbstractMeta extends Element
{
    use Attribute\Custom\HasAttributes;
    use Attribute\HasClass;
    use Attribute\HasId;
    use Attribute\HasLang;
    use Attribute\HasStyle;
    use Attribute\Tag\HasCharset;
    use Attribute\Tag\HasHttpEquiv;

    protected array $attributes = [];

    /**
     * Sets the name and content attributes.
     *
     * @param string $value The name value.
     * @param string $content The content value.
     *
     * @return static A new instance with the name and content attributes.
     */
    public function content(string $value, string $content): static
    {
        $new = clone $this;
        $new->attributes['name'] = $value;
        $new->attributes['content'] = Encode::content($content);

        return $new;
    }

    /**
     * Generate the HTML representation of the element.
     *
     * @return string The HTML representation of the element.
     */
    protected function run(): string
    {
        return Tag::widget()->attributes($this->attributes)->id($this->id)->tagName('meta')->render();
    }
}
