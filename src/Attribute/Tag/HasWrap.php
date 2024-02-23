<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Tag;

use InvalidArgumentException;
use PHPForge\Html\Attribute\Custom\HasValidateInList;

/**
 * Is used by widgets that implement the wrap method.
 */
trait HasWrap
{
    use HasValidateInList;

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
        $this->validateInList(
            $value,
            'Invalid value "%s" for the wrap attribute. Allowed values are: "%s".',
            'hard',
            'soft',
        );

        $new = clone $this;
        $new->attributes['wrap'] = $value;

        return $new;
    }
}
