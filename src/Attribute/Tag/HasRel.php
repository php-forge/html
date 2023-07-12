<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Tag;

use InvalidArgumentException;

use function in_array;

/**
 * Is used by widgets which have a rel attribute.
 */
trait HasRel
{
    /**
     * @psalm-var string[] $relValues
     */
    private array $relValues = [
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

    /**
     * Returns a new instance specifying the relationship of the linked URL as space-separated link types.
     *
     * @param string $value The relationship of the linked URL as space-separated link types.
     * Values allowed are: `alternate`, `author`, `bookmark`, `help`, `icon`, `license`, `next`, `nofollow`,
     * `noreferrer`, `pingback`, `preconnect`, `prefetch`, `preload`, `prerender`, `prev`, `search`, `sidebar`,
     * `stylesheet`, `tag`.
     *
     * @link https://html.spec.whatwg.org/multipage/links.html#attr-hyperlink-rel
     */
    public function rel(string $value): static
    {
        $values = implode('", "', $this->relValues);

        if (!in_array($value, $this->relValues, true)) {
            throw new InvalidArgumentException('The rel attribute value must be one of "' . $values . '".');
        }

        $new = clone $this;
        $new->attributes['rel'] = $value;

        return $new;
    }
}
