<?php

declare(strict_types=1);

namespace Forge\Html\Tag\Form;

use Forge\Html\Attribute\Attributes;
use Forge\Html\Tag\Tag;

final class Input
{
    /**
     * The `<input>` HTML element is used to create interactive controls for web-based forms in order to accept data
     * from the user; a wide variety of types of input data and control widgets are available, depending on the device
     * and user agent. The `<input>` element is one of the most powerful and complex in all of HTML due to the sheer
     * number of combinations of input types and attributes.
     *
     * @param string|null $type The type attribute. If null, the type attribute will not be added.
     * @param array $attributes The tag attributes in terms of name-value pairs. These will be rendered as the
     * attributes of the resulting tag. The values will be HTML-encoded using {@see Attributes::encode()}.
     *
     * See {@see Attributes::render()} for details on how attributes are being rendered.
     *
     * @return string The generated input tag.
     */
    public function create(string $type = null, array $attributes = []): string
    {
        $attributes['type'] = $type;

        return (new Tag())->create('input', '', $attributes);
    }
}
