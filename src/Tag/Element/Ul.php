<?php

declare(strict_types=1);

namespace Forge\Html\Tag\Element;

use Forge\Html\Attribute\Attributes;
use Forge\Html\Tag\Tag;

/**
 * The <ul> HTML element represents an unordered list of items, typically rendered as a bulleted list.
 *
 * @link https://html.spec.whatwg.org/multipage/grouping-content.html#the-ul-element
 */
final class Ul
{
    /**
     * The created <ul> HTML element.
     *
     * @param array $attributes The tag attributes in terms of name-value pairs. These will be rendered as the
     * attributes of the resulting tag. The values will be HTML-encoded using {@see Attributes::encode()}.
     * See {@see Attributes::render()} for details on how attributes are being rendered.
     * @param array $items The list items. Each item is an array with the following keys:
     * - content: (required) The content of the list item.
     * - attributes: The HTML attributes of the list item.
     *
     * @return string The generated ul tag.
     */
    public function create(array $attributes = [], array $items = []): string
    {
        $li = '';

        /** @psalm-var array[] $items */
        foreach ($items as $item) {
            /** @var array */
            $liAttributes = $item['attributes'] ?? [];
            /** @var string */
            $liContent = $item['content'] ?? '';
            $liTag = (new Li())->create($liAttributes, $liContent);
            $li .= $item === end($items) ? $liTag : $liTag . PHP_EOL;
        }

        return (new Tag())->create('ul', $li, $attributes);
    }
}
