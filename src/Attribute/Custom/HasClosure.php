<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

use Closure;

/**
 * Provides method to configure the Closure that will be called to obtain content.
 */
trait HasClosure
{
    /**
     * Returns a new instance with closure that will be called to obtain content.
     *
     * @param Closure $value The closure that will be called to obtain content.
     */
    public function closure(Closure $value): static
    {
        $new = clone $this;
        $new->closure = $value;

        return $new;
    }
}
