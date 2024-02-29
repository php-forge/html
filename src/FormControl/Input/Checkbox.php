<?php

declare(strict_types=1);

namespace PHPForge\Html\FormControl\Input;

use PHPForge\Html\Helper\Utils;

/**
 * The input element with a type attribute whose value is "checkbox" represents a state or option that can be toggled.
 *
 * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.checkbox.html#input.checkbox
 */
final class Checkbox extends Base\AbstractInputChoice
{
    public function fieldAttributes(string $formModel, string $property, bool $arrayable = false): static
    {
        return $this
            ->id(Utils::generateInputId($formModel, $property))
            ->name(Utils::generateInputName($formModel, $property, $arrayable));
    }

    protected function run(): string
    {
        return $this->buildChoiceTag('checkbox');
    }
}
