<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Tag;

/**
 * Is used by widgets that implement the download method.
 */
trait HasDownload
{
    /**
     * Set the hyperlink is to be used for downloading a resource.
     *
     * @return static A new instance of the current class with the specified download value.
     *
     * @link https://html.spec.whatwg.org/multipage/links.html#attr-hyperlink-download
     */
    public function download(): static
    {
        $new = clone $this;
        $new->attributes['download'] = true;

        return $new;
    }
}
