<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Input;

/**
 * Is used by widgets that implement the name method.
 */
trait HasName
{
    /**
     * Set the name part of the name/value pair associated with this element for the purposes of form submission.
     *
     * @param string|null $value The name of the widget.
     *
     * @return static A new instance of the current class with the specified name.
     *
     * @link https://html.spec.whatwg.org/multipage/form-control-infrastructure.html#attr-fe-name
     */
    public function name(string|null $value): static
    {
        if ($value === '') {
            return $this;
        }

        $new = clone $this;
        $new->attributes['name'] = $value;

        return $new;
    }
}
