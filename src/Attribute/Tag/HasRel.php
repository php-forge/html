<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Tag;

use InvalidArgumentException;
use PHPForge\Html\Attribute\Custom\HasValidateInList;

/**
 * Is used by widgets that implement the rel method.
 */
trait HasRel
{
    use HasValidateInList;

    /**
     * Set the rel attribute specifies the relationship between the current document and the linked document.
     *
     * @param string $value The relationship of the linked URL as space-separated link types.
     *
     * @throws InvalidArgumentException If the value is not one of the allowed values. Allowed values are:
     * `alternate`, `author`, `bookmark`, `help`, `icon`, `license`, `next`, `nofollow`, `noopener`, `noreferrer`,
     * `pingback`, `preconnect`, `prefetch`, `preload`, `prerender`, `prev`, `search`, `sidebar`, `stylesheet`, `tag`.
     *
     * @return static A new instance of the current class with the specified rel value.
     *
     * @link https://html.spec.whatwg.org/multipage/links.html#attr-hyperlink-rel
     */
    public function rel(string $value): static
    {
        $this->validateInList(
            $value,
            'Invalid value "%s" for the rel attribute. Allowed values are: "%s".',
            'alternate',
            'author',
            'bookmark',
            'help',
            'icon',
            'license',
            'next',
            'nofollow',
            'noopener',
            'noreferrer',
            'pingback',
            'preconnect',
            'prefetch',
            'preload',
            'prerender',
            'prev',
            'search',
            'sidebar',
            'stylesheet',
            'tag',
        );

        $new = clone $this;
        $new->attributes['rel'] = $value;

        return $new;
    }
}
