<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Input;

/**
 * Is used by widgets that implement the form method.
 */
trait HasForm
{
    /**
     * Set the form element the tag input element belongs to.
     *
     * The value of this attribute must be the id attribute of a FORM element in the same document.
     *
     * @param string $value The id attribute of FORM element in the same document.
     *
     * @return static A new instance of the current class with the specified form value.
     *
     * @link https://html.spec.whatwg.org/multipage/form-control-infrastructure.html#attr-fae-form
     */
    public function form(string $value): static
    {
        $new = clone $this;
        $new->attributes['form'] = $value;

        return $new;
    }
}
