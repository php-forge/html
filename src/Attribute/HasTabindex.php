<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute;

/**
 * Is used by widgets which have a tabindex attribute.
 */
trait HasTabindex
{
    /**
     * Returns a new instance specifying the tabindex global attribute indicates that its element can be focused, and
     * where it participates in sequential keyboard navigation (usually with the Tab key, hence the name).
     *
     * It accepts an integer as a value, with different results depending on the integer's value:
     *
     * - A negative value (usually `tabindex="-1"`) means that the element isn't reachable via sequential keyboard
     * navigation, but could be focused with Javascript or visually. It's mostly useful to create accessible widgets
     * with JavaScript.
     *
     * - `tabindex="0"` means that the element should be focusable in sequential keyboard navigation, but its order is
     * defined by the document's source order.
     *
     * - A positive value means the element should be focusable in sequential keyboard navigation, with its order
     * defined by the value of the number. That's, tabindex="4" is focused before tabindex="5", but after tabindex="3".
     *
     * @param int $value The tabindex value.
     *
     * @link https://html.spec.whatwg.org/multipage/interaction.html#attr-tabindex
     */
    public function tabIndex(int $value): static
    {
        $new = clone $this;
        $new->attributes['tabindex'] = $value;

        return $new;
    }
}
