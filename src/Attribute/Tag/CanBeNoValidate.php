<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Tag;

/**
 * Is used by widgets that implement the novalidate method.
 */
trait CanBeNoValidate
{
    /**
     * If present, they indicate that the form isn't to be validated during submission.
     *
     * @return static A new instance of the current class with the specified novalidate attribute.
     *
     * @link https://www.w3.org/TR/html52/sec-forms.html#element-attrdef-form-novalidate
     */
    public function noValidate(): static
    {
        $new = clone $this;
        $new->attributes['novalidate'] = true;

        return $new;
    }
}
