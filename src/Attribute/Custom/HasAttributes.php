<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

use function array_merge;

/**
 * Is used by widgets which implement the attribute method.
 *
 * @link https://www.w3.org/TR/html52/dom.html#global-attributes
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Attributes
 */
trait HasAttributes
{
    /**
     * Set the `HTML` attributes.
     *
     * @param array $values Attribute values indexed by attribute names.
     *
     * @return static A new instance of the current class with the specified attributes.
     */
    public function attributes(array $values): static
    {
        $new = clone $this;
        $new->attributes = array_merge($this->attributes, $values);

        return $new;
    }
}
