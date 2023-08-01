<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

use PHPForge\Html\Helper\CssClass;
use PHPForge\Html\Helper\Encode;
use PHPForge\Widget\WidgetInterface;

/**
 * Is used by components that can have a toggle.
 */
trait HasToggle
{
    private bool $toggle = true;
    private array $toggleAttributes = [];
    private string $toggleClass = '';
    private string $toggleContent = '';
    private string $toggleId = '';
    private string $toggleSvg = '';

    /**
     * Returns a new instance, specifying disabled toggle.
     */
    public function notToggle(): static
    {
        $new = clone $this;
        $new->toggle = false;

        return $new;
    }

    /**
     * Returns a new instance specifying the `HTML` attributes for the toggle button.
     *
     * @param array $value The `HTML` attributes for the toggle button.
     */
    public function toggleAttributes(array $value): static
    {
        $new = clone $this;
        $new->toggleAttributes = array_merge($value, $new->toggleAttributes);

        return $new;
    }

    /**
     * Returns a new instance specifying the `CSS` class for the toggle button.
     *
     * @param string $value The `CSS` class for the toggle button.
     */
    public function toggleClass(string $value): static
    {
        $new = clone $this;
        CssClass::add($new->toggleAttributes, $value);

        return $new;
    }

    /**
     * Returns a new instance specifying the toggle button content.
     *
     * @param string|WidgetInterface ...$values The toggle button content.
     */
    public function toggleContent(string|WidgetInterface ...$values): static
    {
        $new = clone $this;

        foreach ($values as $value) {
            if ($value instanceof WidgetInterface) {
                $value = $value->render();
            }

            $new->toggleContent .= match (Encode::isValidTag($value)) {
                true => $value,
                false => Encode::content($value),
            };
        }

        return $new;
    }

    /**
     * Returns a new instance specifying the toggle data attribute.
     *
     * @param string $name The toggle data attribute name.
     */
    public function toggleDataAttribute(string $name, string $value): static
    {
        $new = clone $this;
        $new->toggleAttributes["data-$name"] = $value;

        return $new;
    }

    /**
     * Returns a new instance specifying the toggle button ID.
     *
     * @param string $value The toggle button ID.
     */
    public function toggleId(string $value): static
    {
        $new = clone $this;
        $new->toggleId = $value;

        return $new;
    }

    /**
     * Returns a new instance specifying the toggle on click event.
     *
     * @param string $value The toggle on click event.
     */
    public function toggleOnClick(string $value): static
    {
        $new = clone $this;
        $new->toggleAttributes['onclick'] = $value;

        return $new;
    }

    /**
     * Returns a new instance specifying the svg for the toggle button.
     *
     * @param string|WidgetInterface $value The svg for the toggle button.
     */
    public function toggleSvg(string|WidgetInterface $value): static
    {
        $new = clone $this;

        if ($value instanceof WidgetInterface) {
            $value = $value->render();
        }

        $new->toggleSvg = match (Encode::isValidTag($value)) {
            true => $value,
            false => Encode::content($value),
        };

        return $new;
    }
}
