<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Tag;

use InvalidArgumentException;

use PHPForge\Html\Attribute\Custom\HasValidateInList;

/**
 * Is used by widgets that implement the loading method.
 */
trait HasLoading
{
    use HasValidateInList;

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
        $this->validateInList(
            $value,
            'Invalid value "%s" for the loading attribute. Allowed values are: "%s".',
            'eager', 'lazy'
        );

        $new = clone $this;
        $new->attributes['loading'] = $value;

        return $new;
    }
}
