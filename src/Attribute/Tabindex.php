<?php

declare(strict_types=1);

namespace Forge\Html\Attribute;

trait Tabindex
{
    /**
     * Returns a new instance with the specified the tabindex global attribute indicates that its element can be
     * focused, and where it participates in sequential keyboard navigation (usually with the Tab key, hence the name).
     *
     * It accepts an integer as a value, with different results depending on the integer's value:
     *
     * - A negative value (usually `tabindex="-1"`) means that the element is not reachable via sequential keyboard
     * navigation, but could be focused with Javascript or visually. It's mostly useful to create accessible widgets
     * with JavaScript.
     *
     * - `tabindex="0"` means that the element should be focusable in sequential keyboard navigation, but its order is
     * defined by the document's source order.
     *
     * - A positive value means the element should be focusable in sequential keyboard navigation, with its order
     * defined by the value of the number. That is, tabindex="4" is focused before tabindex="5", but after tabindex="3".
     *
     * @param int $value The tabindex value.
     *
     * @return static
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
