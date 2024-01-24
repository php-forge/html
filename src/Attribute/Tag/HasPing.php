<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Tag;

/**
 * Is used by widgets that implement the ping method.
 */
trait HasPing
{
    /**
     * Set a space-separated list of URLs.
     *
     * When the link is followed, the browser will send POST requests with the body PING to the URLs.
     *
     * Typically, for tracking.
     *
     * @param string $value A space-separated list of URLs.
     *
     * @return static A new instance of the current class with the specified ping value.
     *
     * @link https://html.spec.whatwg.org/multipage/links.html#attr-hyperlink-ping
     */
    public function ping(string $value): static
    {
        $new = clone $this;
        $new->attributes['ping'] = $value;

        return $new;
    }
}
