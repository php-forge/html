<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute;

use function uniqid;

/**
 * Is used by widgets which have an id attribute.
 */
trait HasId
{
    /**
     * Returns a new instance specifying the ID of the widget.
     *
     * @param string|null $id The ID of the widget.
     *
     * @link https://html.spec.whatwg.org/multipage/dom.html#the-id-attribute
     */
    public function id(string|null $id): static
    {
        $new = clone $this;
        $new->attributes['id'] = $id;

        return $new;
    }

    public function generateId(): string
    {
        /** @psalm-var string */
        return $this->attributes['id'] ??= uniqid('id_');
    }
}
