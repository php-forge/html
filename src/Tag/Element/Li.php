<?php

declare(strict_types=1);

namespace Forge\Html\Tag\Element;

use Forge\Html\Attribute\Attributes;
use Forge\Html\Tag\Tag;

final class Li
{
    /**
     * Generates an li tag.
     *
     * @param array $attributes The tag attributes in terms of name-value pairs. These will be rendered as the
     * attributes of the resulting tag. The values will be HTML-encoded using {@see Attributes::encode()}.
     * @param string $content The content of the tag.
     *
     * See {@see Attributes::render()} for details on how attributes are being rendered.
     *
     * @return string The generated li tag.
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
