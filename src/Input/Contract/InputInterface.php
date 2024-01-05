<?php

declare(strict_types=1);

namespace PHPForge\Html\Input\Contract;

use PHPForge\Widget\ElementInterface;

/**
 * Provide methods for handling HTML input-related attributes.
 */
interface InputInterface extends ElementInterface
{
    /**
     * Set the `HTML` attributes.
     *
     * @param array $values Attribute values indexed by attribute names.
     *
     * @return static A new instance of the current class with the specified attributes.
     */
    public function attributes(array $values): static;

    /**
     * Set the ID of the widget.
     *
     * @param string|null $value The ID of the widget.
     *
     * @return static A new instance of the current class with the specified ID value.
     *
     * @link https://html.spec.whatwg.org/multipage/dom.html#the-id-attribute
     */
    public function id(string|null $value): static;

    /**
     * set the value content attribute gives the default value of the field.
     *
     * @param mixed $value The value of the widget.
     *
     * @return static A new instance of the current class with the specified value.
     *
     * @link https://html.spec.whatwg.org/multipage/input.html#attr-input-value
     */
    public function value(mixed $value): static;
}
