<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Input;

use InvalidArgumentException;

/**
 * Is used by widgets which have a dirname attribute.
 */
trait HasDirname
{
    /**
     * Returns a new instance specifying when enables submission of a value for the directionality of the element,
     * and gives the name of the field that contains that value.
     *
     * @param string $value The name of the field that contains the directionality of the element.
     *
     * @link https://html.spec.whatwg.org/multipage/form-control-infrastructure.html#attr-fe-dirname
     */
    public function dirname(string $value): static
    {
        if ($value === '') {
            throw new InvalidArgumentException('The value cannot be empty.');
        }

        $new = clone $this;
        $new->attributes['dirname'] = $value;

        return $new;
    }
}
