<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute;

use Closure;
use InvalidArgumentException;

/**
 * Is used by widgets which have a data attribute.
 */
trait HasData
{
    /**
     * Returns a new instance specifying the data attribute.
     *
     * @param array $values The data attribute values.
     *
     * @link https://html.spec.whatwg.org/multipage/dom.html#attr-data-*
     */
    public function dataAttributes(array $values): static
    {
        $new = clone $this;

        foreach ($values as $key => $value) {
            if (!is_string($key) || (!is_string($value) && !$value instanceof Closure)) {
                throw new InvalidArgumentException(
                    'The data attribute key must be a string and the value must be a string or a Closure.',
                );
            }

            $new->attributes[$key] = $value;
        }

        return $new;
    }
}
