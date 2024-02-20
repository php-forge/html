<?php

declare(strict_types=1);

namespace PHPForge\Html\Grouping;

use PHPForge\Html\Attribute\{Input\HasType, Tag\HasReversed, Tag\HasStart};

/**
 * The `<ol> HTML element represents an ordered list of items, typically rendered as a numbered list.
 *
 * @link https://html.spec.whatwg.org/multipage/grouping-content.html#the-ol-element
 */
final class Ol extends Base\AbstractList
{
    use HasReversed;
    use HasStart;
    use HasType;

    protected string $tagName = 'ol';
}
