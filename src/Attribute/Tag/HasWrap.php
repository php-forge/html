<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Tag;

use InvalidArgumentException;

use function implode;
use function in_array;
use function sprintf;

/**
 * Is used by widgets that implement the wrap method.
 */
trait HasWrap
{
    /**
     * Set the wrap attribute is an enumerated attribute with two keywords and states: the soft keyword, which maps to
     * the Soft state, and the hard keyword which maps to the Hard state.
     *
     * The missing value default and invalid value default are the Soft state.
     *
     * @param string $value Has the hard and soft values.
     *
     * @throws InvalidArgumentException If the wrap value is not one of the allowed values. Allowed values are:
     * `hard`, `soft`.
     *
     * @return static A new instance of the current class with the specified wrap value.
     *
     * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/textarea.html#textarea.attrs.wrap.hard
     * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/textarea.html#textarea.attrs.wrap.soft
     */
    public function wrap(string $value = 'hard'): static
    {
        $allowedWrapValues = ['hard', 'soft'];

        if (in_array($value, $allowedWrapValues, true) === false) {
            throw new InvalidArgumentException(
                sprintf(
                    'The wrap value must be one of the following: %s',
                    implode(', ', $allowedWrapValues)
                )
            );
        }

        $new = clone $this;
        $new->attributes['wrap'] = $value;

        return $new;
    }
}
