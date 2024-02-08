<?php

declare(strict_types=1);

namespace PHPForge\Html;

/**
 * The `<ol> HTML element represents an ordered list of items, typically rendered as a numbered list.
 *
 * @link https://html.spec.whatwg.org/multipage/grouping-content.html#the-ol-element
 */
final class Ol extends Base\AbstractList
{
    use Attribute\Tag\HasReversed;
    use Attribute\Tag\HasStart;

    protected string $tagName = 'ol';
}
