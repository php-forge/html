<?php

declare(strict_types=1);

namespace PHPForge\Html\Metadata;

use PHPForge\Html\{
    Attribute\Custom\HasAttributes,
    Attribute\Custom\HasContentAttribute,
    Attribute\HasClass,
    Attribute\HasId,
    Attribute\HasLang,
    Attribute\HasStyle,
    Attribute\Input\HasName,
    Attribute\Tag\HasCharset,
    Attribute\Tag\HasHttpEquiv,
    Tag
};
use PHPForge\Widget\Element;

/**
 * The `<meta>` HTML element represents metadata that cannot be represented by other HTML meta-related elements,
 * like `<base>`, `<link>`, `<script>`, `<style>`, or `<title>`.
 *
 * @link https://html.spec.whatwg.org/multipage/semantics.html#the-meta-element
 */
final class Meta extends Element
{
    use HasAttributes;
    use HasCharset;
    use HasClass;
    use HasContentAttribute;
    use HasHttpEquiv;
    use HasId;
    use HasLang;
    use HasName;
    use HasStyle;

    private array $attributes = [];

    /**
     * Generate the HTML representation of the element.
     *
     * @return string The HTML representation of the element.
     */
    protected function run(): string
    {
        return Tag::widget()->attributes($this->attributes)->tagName('meta')->render();
    }
}
