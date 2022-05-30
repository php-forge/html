<?php

declare(strict_types=1);

namespace Forge\Html\Tag\Element;

use Forge\Html\Attribute\Attributes;
use Forge\Html\Tag\Tag;

final class Nav
{
    /**
     * Generates an nav tag.
     *
     * @param array $attributes The tag attributes in terms of name-value pairs. These will be rendered as the
     * attributes of the resulting tag. The values will be HTML-encoded using {@see Attributes::encode()}.
     *
     * See {@see Attributes::render()} for details on how attributes are being rendered.
     *
     * @return string The generated nav tag.
     */
    public function create(array $attributes = []): string
    {
        return (new Tag())->create('nav', '', $attributes);
    }
}
