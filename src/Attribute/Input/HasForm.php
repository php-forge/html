<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Input;

/**
 * Is used by widgets which have a form attribute.
 */
trait HasForm
{
    /**
     * Returns a new instance specifying the form element the tag input element belongs to.
     *
     * The value of this attribute must be the id attribute of a FORM element in the same document.
     *
     * @param string $value The id attribute of FORM element in the same document.
     *
     * {@link https://www.w3.org/TR/2012/WD-html-markup-20120329/form.html#form} the FORM element.
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
