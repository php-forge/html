<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Input;

/**
 * Is used by widgets which have a name attribute.
 */
trait HasName
{
    /**
     * Returns a new instance specifying the name part of the name/value pair associated with this element for the
     * purposes of form submission.
     *
     * @param string|null $value The name of the widget.
     *
     * @link https://html.spec.whatwg.org/multipage/form-control-infrastructure.html#attr-fe-name
     */
    public function name(string|null $value): static
    {
        $new = clone $this;
        $new->attributes['name'] = $value;

        return $new;
    }
}
