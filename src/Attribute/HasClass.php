<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute;

use PHPForge\Html\Helper\CssClass;

/**
 * Is used by widgets which have a class attribute.
 */
trait HasClass
{
    /**
     * Returns a new instance specifying the `CSS` `HTML` class attribute of the widget.
     *
     * @param string $value The `CSS` attribute of the widget.
     *
     * @link https://html.spec.whatwg.org/#classes
     */
    public function class(string $value): static
    {
        $new = clone $this;
        CssClass::add($new->attributes, $value);

        return $new;
    }
}
