<?php

declare(strict_types=1);

namespace PHPForge\Html\Grouping;

/**
 * The `<ul>` HTML element represents an unordered list of items, typically rendered as a bulleted list.
 *
 * @link https://html.spec.whatwg.org/multipage/grouping-content.html#the-ul-element
 */
final class Ul extends Base\AbstractList
{
    protected string $tagName = 'ul';
}
