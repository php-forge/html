<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Tag;

use InvalidArgumentException;

use function in_array;

/**
 * Is used by widgets which have a target attribute.
 */
trait HasTarget
{
    /**
     * @psalm-var string[] $targetValues
     */
    private array $targetValues = ['_blank', '_self', '_parent', '_top'];

    /**
     * Returns a new instances specifying target attributes, if specified, must have values that are valid browsing
     * context names or keywords.
     *
     * @param string $value The target attribute value.
     * Values allowed are: `_blank`, `_self`, `_parent` or `_top`.
     *
     * @link https://html.spec.whatwg.org/multipage/links.html#attr-hyperlink-target
     */
    public function target(string $value): static
    {
        $values = implode('", "', $this->targetValues);

        if (!in_array($value, $this->targetValues, true)) {
            throw new InvalidArgumentException("The target attribute value must be one of \"$values\".");
        }

        $new = clone $this;
        $new->attributes['target'] = $value;

        return $new;
    }
}
