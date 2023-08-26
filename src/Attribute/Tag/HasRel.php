<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Tag;

use InvalidArgumentException;

use function implode;
use function in_array;
use function sprintf;

/**
 * Is used by widgets that implement the rel method.
 */
trait HasRel
{
    /**
     * Set the rel attribute specifies the relationship between the current document and the linked document.
     *
     * @param string $value The relationship of the linked URL as space-separated link types.
     *
     * @return static A new instance of the current class with the specified rel value.
     *
     * @throws InvalidArgumentException If the value is not one of the allowed values. Allowed values are:
     * `alternate`, `author`, `bookmark`, `help`, `icon`, `license`, `next`, `nofollow`, `noopener`, `noreferrer`,
     * `pingback`, `preconnect`, `prefetch`, `preload`, `prerender`, `prev`, `search`, `sidebar`, `stylesheet`, `tag`.
     *
     * @link https://html.spec.whatwg.org/multipage/links.html#attr-hyperlink-rel
     */
    public function rel(string $value): static
    {
        $allowedRelValues = [
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
        ];

        if (in_array($value, $allowedRelValues, true) === false) {
            throw new InvalidArgumentException(
                sprintf(
                    'The rel value must be one of the following: %s',
                    implode(', ', $allowedRelValues)
                )
            );
        }

        $new = clone $this;
        $new->attributes['rel'] = $value;

        return $new;
    }
}
