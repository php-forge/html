<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

use Closure;
use PHPForge\Html\Helper\CssClass;
use PHPForge\Html\Helper\Encode;
use PHPForge\Widget\ElementInterface;

/**
 * Is used by widgets that implement the label methods.
 */
trait HasLabel
{
    protected array $labelAttributes = [];
    protected string $labelClass = '';
    protected Closure|null $labelClosure = null;
    protected string $labelContent = '';
    protected bool $notLabel = false;

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
     *
     * @return static A new instance of the current class with the specified label class.
     */
    public function labelClass(string $value): static
    {
        $new = clone $this;
        CssClass::add($new->labelAttributes, $value);

        return $new;
    }

    /**
     * Set the `HTML` label content.
     *
     * @param ElementInterface|string $values The `HTML` label content value.
     *
     * @return static A new instance of the current class with the specified `HTML` label content.
     */
    public function labelContent(string|ElementInterface ...$values): static
    {
        $new = clone $this;
        $new->labelContent = Encode::santizeXSS(...$values);

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
        $new->labelAttributes['for'] = $value;

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
        $new->notLabel = true;

        return $new;
    }

    /**
     * Determine if the label is disabled or not.
     *
     * @return bool `true` if the label is disabled, `false` otherwise.
     */
    public function isNotLabel(): bool
    {
        return $this->notLabel;
    }
}
