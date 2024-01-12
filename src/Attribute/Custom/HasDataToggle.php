<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

use PHPForge\Html\Attribute\Enum\DataAttributes;

/**
 * Is used by widgets that implement the dataToggle method.
 */
trait HasDataToggle
{
    /**
     * Set the data attribute.
     *
     * @param array $values The data attribute values.
     *
     * @return static A new instance of the current class with the specified data attribute values.
     *
     * @link https://html.spec.whatwg.org/multipage/dom.html#attr-data-*
     */
    abstract public function dataAttributes(array $values): static;

    /**
     * Set the `HTML` data toggle attribute for the toggle.
     *
     * @param bool|string $value The data-toggle attribute value. If true, the value of the id attribute will be
     * used.
     *
     * @return static A new instance of the current class with the specified toggle attributes.
     */
    public function dataToggle(bool|string $value): static
    {
        if (is_string($value)) {
            return $this->dataAttributes([DataAttributes::TOGGLE => $value]);
        }

        $new = clone $this;
        $new->dataToggle = $value;

        return $new;
    }
}
