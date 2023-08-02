<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Tag;

use function strtoupper;

/**
 * Is used by widgets which have a method property.
 */
trait HasMethod
{
    protected string $method = '';

    /**
     * Returns a new instances with the method attribute specify how the form-data should be submitted.
     *
     * @param string $value The method attribute value.
     *
     * @link https://www.w3.org/TR/html52/sec-forms.html#element-attrdef-form-method
     */
    public function method(string $value): static
    {
        $new = clone $this;
        $new->method = strtoupper($value);

        return $new;
    }
}
