<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Field;

use PHPForge\Html\Helper\Utils;

/**
 * Is used by widgets that implement the generateField method.
 */
trait HasGenerateField
{
    /**
     * Generate the id and name attributes for the field.
     *
     * @param string $modelName The name of the model.
     * @param string $fieldName The name of the field.
     * @param bool $arrayable Whether the field is arrayable.
     *
     * @return static A new instance or clone of the current object with the id and name attributes set.
     */
    public function generateField(string $modelName, string $fieldName, bool $arrayable = false): static
    {
        $new = clone $this;
        $new->attributes['id'] = Utils::generateInputId($modelName, $fieldName);
        $new->attributes['name'] = Utils::generateInputName($modelName, $fieldName, $arrayable);

        return $new;
    }
}
