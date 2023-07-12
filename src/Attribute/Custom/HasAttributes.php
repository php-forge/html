<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

use function array_merge;

/**
 * Is used by widgets which have an attributes.
 *
 * @link https://www.w3.org/TR/html52/dom.html#global-attributes
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Attributes
 */
trait HasAttributes
{
    /**
     * Returns a new instance specifying the `HTML` attributes.
     *
     * @param array $values Attribute values indexed by attribute names.
     */
    public function attributes(array $values): static
    {
        $new = clone $this;
        $new->attributes = array_merge($this->attributes, $values);

        return $new;
    }
}
