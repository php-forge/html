<?php

declare(strict_types=1);

namespace PHPForge\Html\Metadata;

use PHPForge\Html\Attribute\Custom\HasAttributes;
use PHPForge\Html\Attribute\Custom\HasContentAttribute;
use PHPForge\Html\Attribute\Input\HasName;
use PHPForge\Html\Attribute\Tag\{HasCharset, HasHttpEquiv};
use PHPForge\Html\Attribute\{HasClass, HasId, HasLang, HasStyle};
use PHPForge\Html\Tag;
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
        return Tag::widget()->attributes($this->attributes)->id($this->id)->tagName('meta')->render();
    }
}
