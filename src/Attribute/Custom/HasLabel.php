<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

use Closure;
use PHPForge\Html\Helper\CssClass;
use PHPForge\Html\Helper\Encode;

/**
 * Provides methods to configure the label for the widget.
 */
trait HasLabel
{
    private string $label = '';
    private array $labelAttributes = [];
    private string $labelClass = '';
    private Closure|null $labelClosure = null;
    private bool $notLabel = false;

    /**
     * Returns a new instance with the label attributes is an array that defines the HTML attributes of the label
     * element.
     *
     * @param array $values The Attribute values indexed by attribute names for field widget.
     */
    public function labelAttributes(array $values): static
    {
        $new = clone $this;
        $new->labelAttributes = $values;

        return $new;
    }

    /**
     * Returns a new instance with the label class is a string that defines the class of the label element.
     *
     * @param string $value The value of the class attribute.
     */
    public function labelClass(string $value): static
    {
        $new = clone $this;
        CssClass::add($new->labelAttributes, $value);

        return $new;
    }

    /**
     * Returns a new instance with the label closure.
     *
     * @param Closure $value The label closure.
     */
    public function labelClosure(Closure $value): static
    {
        $new = clone $this;
        $new->labelClosure = $value;

        return $new;
    }

    /**
     * Returns a new instance with the label attribute value is a string that defines the text of the label element.
     *
     * @param string $value The value of the label attribute. If null, the label won't be rendered.
     */
    public function label(string $value, bool $encode = true): static
    {
        if ($encode) {
            $value = Encode::content($value);
        }

        $new = clone $this;
        $new->label = $value;

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
     * Returns a new instance where the label isn't rendered.
     */
    public function notLabel(): static
    {
        $new = clone $this;
        $new->notLabel = true;

        return $new;
    }

    /**
     * Returns a new instance whether the label is not rendered.
     */
    public function isNotLabel(): bool
    {
        return $this->notLabel;
    }
}
