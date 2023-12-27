<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute;

use Closure;
use InvalidArgumentException;
use PHPForge\Html\Attribute\Enum\DataAttributes;

/**
 * Is used by widgets that implement the dataAttributes method.
 */
trait HasData
{
    protected bool|string $dataBsTarget = false;
    protected bool|string $dataDismissTarget = false;
    protected bool|string $dataDrawerTarget = false;
    protected bool|string $dataDropdownToggle = false;
    protected bool|string $dataToggle = false;

    /**
     * Set the data attribute.
     *
     * @param array $values The data attribute values.
     *
     * @return static A new instance of the current class with the specified data attribute values.
     *
     * @link https://html.spec.whatwg.org/multipage/dom.html#attr-data-*
     */
    public function dataAttributes(array $values): static
    {
        $new = clone $this;

        foreach ($values as $key => $value) {
            if (!is_string($key) || (!is_string($value) && !$value instanceof Closure)) {
                throw new InvalidArgumentException(
                    'The data attribute key must be a string and the value must be a string or a Closure.',
                );
            }


            $new->attributes["data-$key"] = $value;
        }

        return $new;
    }

    /**
     * Set the `HTML` data-bs-auto-close attribute for the toggle.
     *
     * @param string $value The data-bs-auto-close attribute value.
     *
     * @return static A new instance of the current class with the specified toggle attributes.
     */
    public function dataBsAutoClose(string $value): static
    {
        return $this->dataAttributes([DataAttributes::BS_AUTO_CLOSE => $value]);
    }

    /**
     * Set the `HTML` data-bs-toggle attribute for the toggle.
     *
     * @param string $value The data-bs-toggle attribute value.
     *
     * @return static A new instance of the current class with the specified toggle attributes.
     */
    public function dataBsToggle(string $value): static
    {
        return $this->dataAttributes([DataAttributes::BS_TOGGLE => $value]);
    }

    /**
     * Set the `HTML` data-bs-target attribute for the toggle.
     *
     * @param bool|string $value The data-bs-target attribute value. If true, the value of the id attribute will be
     * used.
     *
     * @return static A new instance of the current class with the specified toggle attributes.
     */
    public function dataBsTarget(bool|string $value): static
    {
        if (is_string($value)) {
            return $this->dataAttributes([DataAttributes::BS_TARGET => $value]);
        }

        $new = clone $this;
        $new->dataBsTarget = $value;

        return $new;
    }

    /**
     * Set the `HTML` data-collapse-toggle attribute for the toggle.
     *
     * @param string $value The data-collapse-toggle attribute value.
     *
     * @return static A new instance of the current class with the specified toggle attributes.
     */
    public function dataCollapseToggle(string $value): static
    {
        return $this->dataAttributes([DataAttributes::COLLAPSE_TOGGLE => $value]);
    }

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

    /**
     * Set the `HTML` data drawer target attribute for the toggle.
     *
     * @param bool|string $value The data-drawer-target attribute value. If true, the value of the id attribute will be
     * used.
     *
     * @return static A new instance of the current class with the specified toggle attributes.
     */
    public function dataDrawerTarget(bool|string $value): static
    {
        if (is_string($value)) {
            return $this->dataAttributes([DataAttributes::DRAWER_TARGET => $value]);
        }

        $new = clone $this;
        $new->dataDrawerTarget = $value;

        return $new;
    }

    /**
     * Set the `HTML` data dropdown toggle attribute for the toggle.
     *
     * @param bool|string $value The data-dropdown-toggle attribute value. If true, the value of the id attribute will
     * be used.
     *
     * @return static A new instance of the current class with the specified toggle attributes.
     */
    public function dataDropdownToggle(bool|string $value): static
    {
        if (is_string($value)) {
            return $this->dataAttributes([DataAttributes::DROPDOWN_TOGGLE => $value]);
        }

        $new = clone $this;
        $new->dataDropdownToggle = $value;

        return $new;
    }

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
