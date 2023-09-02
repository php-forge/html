<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute;

use function uniqid;

/**
 * Is used by widgets that implement the id method.
 */
trait HasId
{
    protected string|null $id = null;

    /**
     * Set the ID of the widget.
     *
     * @param string|null $value The ID of the widget.
     *
     * @return static A new instance of the current class with the specified ID value.
     *
     * @link https://html.spec.whatwg.org/multipage/dom.html#the-id-attribute
     */
    public function id(string|null $value): static
    {
        $new = clone $this;
        $new->id = $value;

        return $new;
    }

    /**
     * Generate a unique ID for the widget.
     *
     * @param string $value The value to use for the ID.
     *
     * @return string A unique ID for the widget.
     */
    public function generateId(string $value = 'id_'): string
    {
        /** @psalm-var string */
        return $this->id ??= uniqid($value);
    }
}
