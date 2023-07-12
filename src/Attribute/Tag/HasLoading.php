<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Tag;

use InvalidArgumentException;

use function in_array;

/**
 * Is used by widgets which have a loading attribute.
 */
trait HasLoading
{
    /**
     * @psalm-var string[] $loadingValues
     */
    private array $loadingValues = ['eager', 'lazy'];

    /**
     * Returns a new instance specifying when the browser should load the image:
     *
     * @param string $value The loading value.
     * Values allowed are: `eager`, `lazy`.
     */
    public function loading(string $value): static
    {
        $values = implode('", "', $this->loadingValues);

        if (!in_array($value, ['eager', 'lazy'], true)) {
            throw new InvalidArgumentException("The loading attribute value must be one of \"$values\".");
        }

        $new = clone $this;
        $new->attributes['loading'] = $value;

        return $new;
    }
}
