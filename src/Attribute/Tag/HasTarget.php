<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Tag;

use InvalidArgumentException;
use PHPForge\Html\Helper\Validator;

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
     * @throws InvalidArgumentException If the target value is not one of the allowed values. Allowed values are:
     * `_blank`, `_self`, `_parent`, `_top`.
     *
     * @return static A new instance of the current class with the specified target value.
     *
     * @link https://html.spec.whatwg.org/multipage/links.html#attr-hyperlink-target
     */
    public function target(string $value): static
    {
        Validator::inList(
            $value,
            'Invalid value "%s" for the target attribute. Allowed values are: "%s".',
            '_blank',
            '_self',
            '_parent',
            '_top',
        );

        $new = clone $this;
        $new->attributes['target'] = $value;

        return $new;
    }
}
