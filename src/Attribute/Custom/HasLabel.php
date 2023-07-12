<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

use PHPForge\Html\Helper\CssClass;

/**
 * Provides methods to configure the label for the widget.
 */
trait HasLabel
{
    protected string|null $label = '';
    protected array $labelAttributes = [];

    /**
     * Return new instance specifying the label for the widget.
     *
     * @param string $value The label for the widget.
     */
    public function label(string $value): self
    {
        $new = clone $this;
        $new->label = $value;

        return $new;
    }

    /**
     * Return new instance specifying the `HTML` attributes for the label container.
     *
     * @param array $values Attribute values indexed by attribute names.
     */
    public function labelAttributes(array $values = []): static
    {
        $new = clone $this;
        $new->labelAttributes = $values;

        return $new;
    }

    /**
     * Returns a new specifying the `CSS` HTML label class name.
     *
     * @param string $value The css class name
     */
    public function labelClass(string $value): static
    {
        $new = clone $this;
        CssClass::add($new->labelAttributes, $value);

        return $new;
    }

    /**
     * Returns a new instance specifying the `HTML` label `for` attribute.
     *
     * @param string|null $value The value for the `for` attribute.
     */
    public function labelFor(string|null $value): static
    {
        $new = clone $this;
        $new->labelAttributes['for'] = $value;

        return $new;
    }

    /**
     * Returns a new instance specifying when the label its disabled.
     */
    public function notLabel(): static
    {
        $new = clone $this;
        $new->label = null;

        return $new;
    }
}
