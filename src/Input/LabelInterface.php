<?php

declare(strict_types=1);

namespace PHPForge\Html\Input;

use PHPForge\Widget\ElementInterface;

interface LabelInterface
{
    /**
     * Set the `HTML` attributes for the label.
     *
     * @param array $values Attribute values indexed by attribute names.
     *
     * @return static A new instance of the current class with the specified label attributes.
     */
    public function labelAttributes(array $values): static;

    /**
     * Set the `CSS` class for the label.
     *
     * @param string $value The value of the class attribute.
     * @param bool $override If `true` the value will be overridden.
     *
     * @return static A new instance of the current class with the specified label class.
     */
    public function labelClass(string $value, bool $override = false): static;

    /**
     * Set the `HTML` label content.
     *
     * @param ElementInterface|string $values The `HTML` label content value.
     *
     * @return static A new instance of the current class with the specified `HTML` label content.
     */
    public function labelContent(string|ElementInterface ...$values): static;

    /**
     * Set the `for` attribute for the label.
     *
     * @param string|null $value The value for the `for` attribute.
     *
     * @return static A new instance of the current class with the specified label `for` attribute.
     */
    public function labelFor(string|null $value): static;

    /**
     * Disable the label rendering.
     *
     * @return static A new instance of the current class with the label disabled.
     */
    public function notLabel(): static;

    /**
     * Determine if the label is disabled or not.
     *
     * @return bool `true` if the label is disabled, `false` otherwise.
     */
    public function isNotLabel(): bool;
}
