<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Tag;

/**
 * Is used by widgets which have a download attribute.
 */
trait HasDownload
{
    /**
     * Returns a new instance specifying that the hyperlink is to be used for downloading a resource.
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
