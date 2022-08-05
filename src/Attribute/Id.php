<?php

declare(strict_types=1);

namespace Forge\Html\Attribute;

trait Id
{
    /**
     * Returns a new instance with the specified the ID of the widget.
     *
     * @param string|null $id The ID of the widget.
     *
     * @return static
     *
     * @link https://html.spec.whatwg.org/multipage/dom.html#the-id-attribute
     */
    public function id(?string $id): static
    {
        $new = clone $this;
        $new->attributes['id'] = $id;

        return $new;
    }
}
