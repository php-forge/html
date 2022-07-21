<?php

declare(strict_types=1);

namespace Forge\Html\Tag\Element;

use Forge\Html\Attribute\Attributes;
use Forge\Html\Tag\Tag;

/**
 * The <nav> HTML element represents a section of a page whose purpose is to provide navigation links, either within
 * the current document or to other documents. Common examples of navigation sections are menus, tables of contents,
 * and indexes.
 *
 * @link https://html.spec.whatwg.org/multipage/sections.html#the-nav-element
 */
final class Nav
{
    /**
     * The beginning <nav> HTML element.
     *
     * @param array $attributes The tag attributes in terms of name-value pairs. These will be rendered as the
     * attributes of the resulting tag. The values will be HTML-encoded using {@see Attributes::encode()}.
     * See {@see Attributes::render()} for details on how attributes are being rendered.
     *
     * @return string The generated <nav> HTML element.
     */
    public function begin(array $attributes = []): string
    {
        return Tag::begin('nav', $attributes);
    }

    /**
     * The end <nav> HTML element.
     *
     * @return string The generated end nav tag.
     */
    public function end(): string
    {
        return Tag::end('nav');
    }
}
