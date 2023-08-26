<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Tag;

/**
 * Is used by widgets that implement the ismap method.
 */
trait HasIsmap
{
    /**
     * Set the image is a server-side image map.
     *
     * If so, the coordinates where the user clicked on the image are sent to the server.
     *
     * @return static A new instance of the current class with the specified ismap value.
     *
     * @link https://html.spec.whatwg.org/multipage/embedded-content.html#attr-img-ismap
     */
    public function ismap(): static
    {
        $new = clone $this;
        $new->attributes['ismap'] = true;

        return $new;
    }
}
