<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

use PHPForge\Html\FormControl\Label;
use PHPForge\Html\Helper\{CssClass, Encode};
use PHPForge\Widget\ElementInterface;

/**
 * Is used by widgets that implement the label methods.
 */
trait HasLabelCollection
{
    protected bool $isLabel = true;
    protected string $label = '';
    protected array $labelAttributes = [];
    protected string $labelClass = '';
    protected string|null $labelFor = null;

    /**
     * Set the `HTML` label content.
     *
     * @param ElementInterface|string ...$values The `HTML` label content value.
     *
     * @return static A new instance of the current class with the specified `HTML` label content.
     */
    public function label(ElementInterface|string ...$values): static
    {
        $new = clone $this;
        $new->label = Encode::sanitizeXSS(...$values);

        return $new;
    }

    /**
     * Set the `HTML` attributes for the label.
     *
     * @param array $values Attribute values indexed by attribute names.
     *
     * @return static A new instance of the current class with the specified label attributes.
     */
    public function labelAttributes(array $values): static
    {
        $new = clone $this;
        $new->labelAttributes = $values;

        return $new;
    }

    /**
     * Set the `CSS` class for the label.
     *
     * @param string $value The value of the class attribute.
     * @param bool $override If `true` the value will be overridden.
     *
     * @return static A new instance of the current class with the specified label class.
     */
    public function labelClass(string $value, bool $override = false): static
    {
        $new = clone $this;
        CssClass::add($new->labelAttributes, $value, $override);

        return $new;
    }

    /**
     * Set the `for` attribute for the label.
     *
     * @param string|null $value The value for the `for` attribute.
     *
     * @return static A new instance of the current class with the specified label `for` attribute.
     */
    public function labelFor(string|null $value): static
    {
        $new = clone $this;
        $new->labelFor = $value;

        return $new;
    }

    /**
     * Disable the label rendering.
     *
     * @return static A new instance of the current class with the label disabled.
     */
    public function notLabel(): static
    {
        $new = clone $this;
        $new->isLabel = false;

        return $new;
    }

    /**
     * Render the label tag.
     *
     * @param string|null $labelFor The `for` attribute value.
     *
     * @return string The rendered label tag.
     */
    protected function renderLabelTag(string $labelFor = null): string
    {
        if ($this->isLabel === false || $this->label === '') {
            return '';
        }

        return Label::widget()->attributes($this->labelAttributes)->content($this->label)->for($labelFor)->render();
    }
}
