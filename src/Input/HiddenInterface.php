<?php

declare(strict_types=1);

namespace PHPForge\Html\Input;

/**
 * Provide methods for handling HTML input-related attributes and properties.
 */
interface HiddenInterface
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
     * Set the name part of the name/value pair associated with this element for the purposes of form submission.
     *
     * @param string|null $value The name of the widget.
     *
     * @return static A new instance of the current class with the specified name.
     *
     * @link https://html.spec.whatwg.org/multipage/form-control-infrastructure.html#attr-fe-name
     */
    public function name(string|null $value): static;

    /**
     * Executes the widget.
     *
     * This method is responsible for executing the widget and returning the result of the execution as a string.
     *
     * @return string The result of widget execution to be outputted.
     */
    public function render(): string;

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
