<?php

declare(strict_types=1);

namespace Forge\Html\Attribute;

use Forge\Html\Helper\CssClass;

trait Classes
{
    /**
     * Returns a new instance with the specified the widget class.
     *
     * @param string $class The widget class.
     *
     * @return static
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
