<?php

declare(strict_types=1);

namespace Forge\Html\Tag\Element;

use Forge\Html\Attribute\Attributes;
use Forge\Html\Tag\Tag;

final class Ul
{
    /**
     * Generates an Ul tag.
     *
     * @param array $attributes The tag attributes in terms of name-value pairs. These will be rendered as the
     * attributes of the resulting tag. The values will be HTML-encoded using {@see Attributes::encode()}.
     * @param array $items The list items. Each item is an array with the following keys:
     * - content: (required) The content of the list item.
     * - attributes: The HTML attributes of the list item.
     *
     * See {@see Attributes::render()} for details on how attributes are being rendered.
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
            $li .= (new Tag())->create('li', $liContent, $liAttributes) . PHP_EOL;
        }

        if ($li !== '') {
            $li = PHP_EOL . $li;
        }

        return (new Tag())->create('ul', $li, $attributes);
    }
}
