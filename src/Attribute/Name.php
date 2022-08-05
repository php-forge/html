<?php

declare(strict_types=1);

namespace Forge\Html\Attribute;

trait Name
{
    /**
     * Returns a new instance with the specified the name part of the name/value pair associated with this element for
     * the purposes of form submission.
     *
     * @param string|null The name of the widget.
     *
     * @return static
     *
     * @link https://html.spec.whatwg.org/multipage/form-control-infrastructure.html#attr-fe-name
     */
    public function name(?string $value): static
    {
        $new = clone $this;
        $new->attributes['name'] = $value;

        return $new;
    }
}
