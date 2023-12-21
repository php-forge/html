<?php

declare(strict_types=1);

namespace PHPForge\Html\Input;

/**
 * Provide methods for handling HTML input-related attributes and properties.
 */
interface InputInterface
{
    /**
     * Set the aria-describedby attribute, which identifies the element(s) that describe the current element.
     *
     * The aria-describedby attribute is used in WAI-ARIA to provide a relationship between an element and its
     * descriptive elements. This helps screen readers and other assistive technologies provide additional context
     * about the element.
     *
     * @param string $value IDs of the descriptive element(s) separated by spaces.
     *
     * @return static A new instance or clone of the current object with the aria-describedby attribute set.
     *
     * @link https://www.w3.org/TR/wai-aria-1.1/#aria-describedby
     */
    public function ariaDescribedBy(string $value): static;

    /**
     * Set the `HTML` attributes.
     *
     * @param array $values Attribute values indexed by attribute names.
     *
     * @return static A new instance of the current class with the specified attributes.
     */
    public function attributes(array $values): static;

    /**
     * Set the `CSS` `HTML` class attribute.
     *
     * @param string $value The `CSS` attribute of the widget.
     * @param bool $override If `true` the value will be overridden.
     *
     * @return static A new instance of the current class with the specified class value.
     *
     * @link https://html.spec.whatwg.org/#classes
     */
    public function class(string $value): static;

    /**
     * Get the ID of the widget.
     *
     * @return string|null The ID of the widget.
     */
    public function getId(): string|null;

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
