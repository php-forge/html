<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Tag;

/**
 * Is an attribute that can be used by widgets that can be novalidate.
 */
trait CanBeNoValidate
{
    /**
     * Return new instances with the novalidate attributes are boolean attributes.
     *
     * If present, they indicate that the form isn't to be validated during submission.
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
