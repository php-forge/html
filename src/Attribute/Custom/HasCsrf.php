<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

use Stringable;

/**
 * Is used by widgets which have a csrf tag.
 */
trait HasCsrf
{
    protected string $csrfName = '_csrf';
    protected string $csrfToken = '';


    /**
     * Returns a new instances with the CSRF-token content attribute token that are known to be safe to use for.
     *
     * @param string|Stringable $csrfToken The CSRF-token attribute value.
     * @param string $csrfName The CSRF-token attribute name.
     */
    public function csrf(string|Stringable $csrfToken, string $csrfName = '_csrf'): static
    {
        $new = clone $this;
        $new->csrfToken = (string) $csrfToken;
        $new->csrfName = $csrfName;

        return $new;
    }
}
