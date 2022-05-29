<?php

declare(strict_types=1);

namespace Forge\Html\Tag\Form;

use Forge\Html\Attribute;
use Forge\Html\Tag\Tag;
use JsonException;

final class Input
{
    /**
     * Generates an input tag.
     *
     * @param null|string $type The type attribute. If null, the type attribute will not be added.
     * @param null|string $name The name attribute. If null, the name attribute will not be added.
     * @param mixed $value the value attribute. If null, the value attribute will not be added.
     * @param array $attributes The tag attributes in terms of name-value pairs. These will be rendered as the
     * attributes of the resulting tag. The values will be HTML-encoded using {@see Attributes::encode()}.
     *
     * If a value is null, the corresponding attribute will not be rendered.
     *
     * See {@see Attributes::render()} for details on how attributes are being rendered.
     *
     * @throws JsonException
     *
     * @return string The generated input tag.
     */
    public function create(
        string $type = null,
        string $name = null,
        mixed $value = null,
        array $attributes = []
    ): string {
        $attributes['type'] = $type;
        $attributes['name'] = $name;
        /** @var mixed */
        $attributes['value'] = $value;

        return (new Tag())->create('input', '', $attributes);
    }
}
