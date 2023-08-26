<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Tag;

use InvalidArgumentException;

use function in_array;

/**
 * Is used by widgets that implement the target method.
 */
trait HasTarget
{
    /**
     * Set the target attributes, if specified, must have values that are valid browsing context names or keywords.
     *
     * @param string $value The target attribute value.
     *
     * @return static A new instance of the current class with the specified target value.
     *
     * @throws InvalidArgumentException If the target value is not one of the allowed values. Allowed values are:
     * `_blank`, `_self`, `_parent`, `_top`.
     *
     * @link https://html.spec.whatwg.org/multipage/links.html#attr-hyperlink-target
     */
    public function target(string $value): static
    {
        $allowedTargetValues = [
            '_blank',
            '_self',
            '_parent',
            '_top',
        ];

        if (in_array($value, $allowedTargetValues, true) === false) {
            throw new InvalidArgumentException(
                sprintf(
                    'The target value must be one of the following: %s',
                    implode(', ', $allowedTargetValues)
                )
            );
        }

        $new = clone $this;
        $new->attributes['target'] = $value;

        return $new;
    }
}
