<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Tag;

use InvalidArgumentException;

use function in_array;
use function sprintf;

/**
 * Is used by widgets that implement the enctype method.
 */
trait HasEnctype
{
    /**
     * Set the enctype content attribute specifies the content type of the form submission.
     *
     * @param string $value The enctype attribute value.
     *
     * @throws InvalidArgumentException If the value is not one of: "multipart/form-data",
     * "application/x-www-form-urlencoded", "text/plain".
     *
     * @return static A new instance of the current class with the specified enctype value.
     *
     * @link https://www.w3.org/TR/html52/sec-forms.html#element-attrdef-form-enctype
     */
    public function enctype(string $value): static
    {
        $allowedEnctype = ['multipart/form-data', 'application/x-www-form-urlencoded', 'text/plain'];

        if (!in_array($value, $allowedEnctype, true)) {
            throw new InvalidArgumentException(
                sprintf('The value must be one of: %s.', implode(', ', $allowedEnctype))
            );
        }

        $new = clone $this;
        $new->attributes['enctype'] = $value;

        return $new;
    }
}
