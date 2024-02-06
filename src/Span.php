<?php

declare(strict_types=1);

namespace PHPForge\Html;

/**
 * The `<span>` HTML element represents a generic inline container for phrasing content, which doesn't inherently represent
 * anything. It can be used to group elements for styling purposes (using the class or id attributes), or because they
 * share attribute values, such as lang. It should be used only when no other semantic element is appropriate.
 *
 * `<span>` is very much like a `<div>` element, but `<div>` is a block-level element whereas a `<span>` is an inline
 * element.
 *
 * @link https://html.spec.whatwg.org/multipage/text-level-semantics.html#the-span-element
 */
final class Span extends Base\AbstractElement
{
    use Attribute\Custom\HasContent;

    protected function run(): string
    {
        return $this->buildElement('span', $this->content);
    }
}
