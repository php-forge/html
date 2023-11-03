<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Tag;

use InvalidArgumentException;

use function in_array;
use function sprintf;

/**
 * Is used by widgets that implement the crossorigin method.
 */
trait HasCrossorigin
{
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
        $allowedCrossorigin = ['anonymous', 'use-credentials'];

        if (!in_array($value, $allowedCrossorigin, true)) {
            throw new InvalidArgumentException(sprintf('The value must be one of: %s.', implode(', ', $allowedCrossorigin)));
        }

        $new = clone $this;
        $new->attributes['crossorigin'] = $value;

        return $new;
    }
}
