<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Tag;

use InvalidArgumentException;

use PHPForge\Html\Attribute\Custom\HasValidateInList;

/**
 * Is used by widgets that implement the crossorigin method.
 */
trait HasCrossorigin
{
    use HasValidateInList;

    /**
     * Set the crossorigin.
     *
     * Image data from a CORS-enabled image returned from a CORS request can be reused in the `<canvas>` element without
     * being marked "tainted".
     *
     * @param string $value The crossorigin value.
     *
     * @throws InvalidArgumentException If the value is not one of: "anonymous", "use-credentials".
     *
     * @return static A new instance of the current class with the specified crossorigin value.
     *
     * @link https://html.spec.whatwg.org/multipage/urls-and-fetching.html#cors-settings-attributes
     */
    public function crossorigin(string $value): static
    {
        $this->validateInList(
            $value,
            'Invalid value "%s" for the crossorigin attribute. Allowed values are: "%s".',
            'anonymous', 'use-credentials'
        );

        $new = clone $this;
        $new->attributes['crossorigin'] = $value;

        return $new;
    }
}
