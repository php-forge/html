<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Tag;

use function strtoupper;

/**
 * Is used by widgets that implement the method.
 */
trait HasMethod
{
    /**
     * Set the method attribute specify how the form-data should be submitted.
     *
     * @param string $value The method attribute value.
     *
     * @return static A new instance of the current class with the specified method value.
     *
     * @link https://www.w3.org/TR/html52/sec-forms.html#element-attrdef-form-method
     */
    public function method(string $value): static
    {
        $new = clone $this;
        $new->attributes['method'] = strtoupper($value);

        return $new;
    }
}
