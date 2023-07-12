<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute;

/**
 * Is used by widgets which have a data attribute.
 */
trait HasData
{
    /**
     * Returns a new instance specifying the data attribute.
     *
     * @param Enum\DataAttributes $dataAttributes The data attribute.
     * @param mixed $value The value of the data attribute.
     *
     * @link https://html.spec.whatwg.org/multipage/dom.html#attr-data-*
     */
    public function dataAttributes(Enum\DataAttributes $dataAttributes, mixed $value): static
    {
        $new = clone $this;
        $new->attributes[$dataAttributes->value] = $value;

        return $new;
    }
}
