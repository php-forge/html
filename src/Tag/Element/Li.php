<?php

declare(strict_types=1);

namespace Forge\Html\Tag\Element;

use Forge\Html\Attribute\Attributes;
use Forge\Html\Tag\Tag;

/**
 * The <li> HTML element is used to represent an item in a list.
 * It must be contained in a parent element: an ordered list (<ol>), an unordered list (<ul>), or a menu (<menu>).
 * In menus and unordered lists, list items are usually displayed using bullet points.
 * In ordered lists, they are usually displayed with an ascending counter on the left, such as a number or letter.
 *
 * @link https://html.spec.whatwg.org/multipage/grouping-content.html#the-li-element
 */
final class Li
{
    /**
     * The created <li> HTML element.
     *
     * @param array $attributes The tag attributes in terms of name-value pairs. These will be rendered as the
     * attributes of the resulting tag. The values will be HTML-encoded using {@see Attributes::encode()}.
     * See {@see Attributes::render()} for details on how attributes are being rendered.
     * @param string $content The content of the tag.
     *
     * @return string The generated <li> HTML element.
     *
     * @psalm-param array{value: mixed}|array $attributes
     *
     * @link https://html.spec.whatwg.org/multipage/grouping-content.html#attr-li-value
     */
    public function create(array $attributes = [], string $content = ''): string
    {
        return (new Tag())->create('li', $content, $attributes);
    }
}
