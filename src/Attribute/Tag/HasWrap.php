<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Tag;

use InvalidArgumentException;

/**
 * Is used by widgets which have a wrap attribute.
 */
trait HasWrap
{
    /**
     * Returns a new instance specifying the wrap attribute is an enumerated attribute with two keywords and states:
     * the soft keyword which maps to the Soft state, and the hard keyword which maps to the Hard state.
     *
     * The missing value default and invalid value default are the Soft state.
     *
     * @param string $value Has the hard and soft values.
     * - `hard` Instructs the UA to insert line breaks into the submitted value of the textarea such that each line has
     *   no more characters than the value specified by the cols attribute.
     * - `soft` Instructs the UA to add no line breaks to the submitted value of the textarea.
     *
     * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/textarea.html#textarea.attrs.wrap.hard
     * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/textarea.html#textarea.attrs.wrap.soft
     */
    public function wrap(string $value = 'hard'): static
    {
        if (!in_array($value, ['hard', 'soft'])) {
            throw new InvalidArgumentException('Invalid wrap value. Valid values are: "hard", "soft".');
        }

        $new = clone $this;
        $new->attributes['wrap'] = $value;

        return $new;
    }
}
