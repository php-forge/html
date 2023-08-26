<?php

declare(strict_types=1);

namespace PHPForge\Html;

/**
 * The `<p>` HTML element represents a paragraph. Paragraphs are usually represented in visual media as blocks of text
 * separated from adjacent blocks by blank lines and/or first-line indentation, but HTML paragraphs can be any
 * structural grouping of related content, such as images or form fields.
 *
 * @link https://html.spec.whatwg.org/multipage/grouping-content.html#the-p-element
 */
final class P extends Base\AbstractBlockElement
{
    protected string $tagName = 'p';
}
