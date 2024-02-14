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
     * Set the `CSS` `HTML` class attribute.
     *
     * @param string $value The `CSS` attribute of the widget.
     * @param bool $override If `true` the value will be overridden.
     *
     * @return static A new instance of the current class with the specified class value.
     *
     * @link https://html.spec.whatwg.org/#classes
     */
    public function class(string $value, bool $override = false): static;

    /**
     * Set the `HTML` attributes.
     *
     * @param array $values Attribute values indexed by attribute names.
     *
     * @return static A new instance of the current class with the specified attributes.
     */
    public function attributes(array $values): static;

    /**
     * Generate the id and name attributes for the field.
     *
     * @param string $modelName The name of the model.
     * @param string $fieldName The name of the field.
     * @param bool $arrayable Whether the field is arrayable.
     *
     * @return static A new instance or clone of the current object with the id and name attributes set.
     */
    public function generateField(string $modelName, string $fieldName, bool $arrayable = false): static;

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
}
