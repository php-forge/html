<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Tag;

use InvalidArgumentException;

use function implode;
use function in_array;
use function sprintf;

/**
 * Is used by widgets that implement the loading method.
 */
trait HasLoading
{
    /**
     * Specifying when the browser should load the image.
     *
     * @param string $value The loading value.
     *
     * @throws InvalidArgumentException If the value is not one of: "eager", "lazy".
     *
     * @return static A new instance of the current class with the specified loading value.
     */
    public function loading(string $value): static
    {
        $allowedLoadingValues = ['eager', 'lazy'];

        if (in_array($value, $allowedLoadingValues, true) === false) {
            throw new InvalidArgumentException(
                sprintf('The value must be one of: %s.', implode(', ', $allowedLoadingValues))
            );
        }

        $new = clone $this;
        $new->attributes['loading'] = $value;

        return $new;
    }
}
