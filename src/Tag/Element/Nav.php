<?php

declare(strict_types=1);

namespace Forge\Html\Tag\Element;

use Forge\Html\Attribute\Attributes;
use Forge\Html\Tag\Tag;

final class Nav
{
    /**
     * The <nav> HTML element represents a section of a page whose purpose is to provide navigation links, either within
     * the current document or to other documents. Common examples of navigation sections are menus, tables of contents,
     * and indexes.
     *
     * @link https://html.spec.whatwg.org/multipage/sections.html#the-nav-element
     *
     * @param array $attributes The tag attributes in terms of name-value pairs. These will be rendered as the
     * attributes of the resulting tag. The values will be HTML-encoded using {@see Attributes::encode()}.
     * @param string $content The content of the tag.
     *
     * See {@see Attributes::render()} for details on how attributes are being rendered.
     *
     * @return string The generated nav tag.
     */
    public function create(array $attributes = [], string $content = ''): string
    {
        return (new Tag())->create('nav', $content, $attributes);
    }
}
