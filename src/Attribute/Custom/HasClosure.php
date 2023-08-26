<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

use Closure;

/**
 * Is used by widgets that implement closure method.
 */
trait HasClosure
{
    protected Closure|null $closure = null;

    /**
     * Set a new closure that will be invoked to obtain `HTML` content.
     *
     * @param Closure $value The closure to be invoked for obtaining `HTML` content.
     *
     * @return static A new instance of the current class with the specified closure.
     */
    public function closure(Closure $value): static
    {
        $new = clone $this;
        $new->closure = $value;

        return $new;
    }
}
