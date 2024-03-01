<?php

declare(strict_types=1);

namespace PHPForge\Html\FormControl;

use PHPForge\Html\{
    Attribute\Custom\HasContent,
    Attribute\FormControl\HasFor,
    Attribute\FormControl\Input\HasForm,
    Base\AbstractElement
};

/**
 * The `<label>` HTML element represents a caption for an item in a user interface.
 *
 * @link https://www.w3.org/TR/html52/sec-forms.html#the-label-element
 */
final class Label extends AbstractElement
{
    use HasContent;
    use HasFor;
    use HasForm;

    protected function run(): string
    {
        if ($this->content === '') {
            return '';
        }

        return $this->buildElement('label', $this->content);
    }
}
