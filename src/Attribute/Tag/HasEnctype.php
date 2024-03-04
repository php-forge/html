<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Tag;

use InvalidArgumentException;
use PHPForge\Html\Helper\Validator;

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
        Validator::inList(
            $value,
            'Invalid value "%s" for the enctype attribute. Allowed values are: "%s".',
            'multipart/form-data',
            'application/x-www-form-urlencoded',
            'text/plain'
        );

        $new = clone $this;
        $new->attributes['enctype'] = $value;

        return $new;
    }
}
