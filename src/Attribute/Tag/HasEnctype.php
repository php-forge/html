<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Tag;

use InvalidArgumentException;

/**
 * Is used by widgets which have a enctype attribute.
 */
trait HasEnctype
{
    /**
     * Returns a new instances with the enctype content attribute specifies the content type of the form submission.
     *
     * @param string $value The enctype attribute value.
     *
     * @link https://www.w3.org/TR/html52/sec-forms.html#element-attrdef-form-enctype
     */
    public function enctype(string $value): static
    {
        if (
            $value !== 'multipart/form-data' &&
            $value !== 'application/x-www-form-urlencoded' &&
            $value !== 'text/plain'
        ) {
            throw new InvalidArgumentException(
                'The formenctype attribute must be one of the following values: ' .
                '"multipart/form-data", "application/x-www-form-urlencoded", "text/plain".'
            );
        }

        $new = clone $this;
        $new->attributes['enctype'] = $value;

        return $new;
    }
}
