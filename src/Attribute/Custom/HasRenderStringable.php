<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

use Stringable;

/**
 * Allows rendering an object of type Stringable.
 */
trait HasRenderStringable
{
    /**
     * Returns a new instance with the stringable value.
     *
     * @param string|Stringable $value The stringable value.
     */
    public function renderStringable(string|Stringable $value): string
    {
        return $value instanceof Stringable ? $value->__toString() : $value;
    }
}
