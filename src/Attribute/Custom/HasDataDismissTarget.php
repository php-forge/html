<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

use PHPForge\Html\Attribute\Enum\DataAttributes;

/**
 * Is used by widgets that implement the dataDismissTarget method.
 */
trait HasDataDismissTarget
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
     * Set the `HTML` data-dismiss-target attribute for the toggle.
     *
     * @param bool|string $value The data-dismiss-target attribute value. If true, the value of the id attribute will be
     * used.
     */
    public function dataDismissTarget(bool|string $value): static
    {
        if (is_string($value)) {
            return $this->dataAttributes([DataAttributes::DISMISS_TARGET => $value]);
        }

        $new = clone $this;
        $new->dataDismissTarget = $value;

        return $new;
    }
}
