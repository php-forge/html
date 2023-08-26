<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

use Stringable;

/**
 * Is used by widgets that implement the csrf method.
 */
trait HasCsrf
{
    protected string $csrfName = '_csrf';
    protected string $csrfToken = '';


    /**
     * Set the CSRF-token attribute token that is known to be safe to use.
     *
     * @param string|Stringable $csrfToken The CSRF-token attribute value.
     * @param string $csrfName The CSRF-token attribute name.
     *
     * @return static A new instance of the current class with the specified csrf token, and csrf name.
     */
    public function csrf(string|Stringable $csrfToken, string $csrfName = '_csrf'): static
    {
        $new = clone $this;
        $new->csrfToken = (string) $csrfToken;
        $new->csrfName = $csrfName;

        return $new;
    }
}
