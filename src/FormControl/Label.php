<?php

declare(strict_types=1);

namespace PHPForge\Html\FormControl;

use PHPForge\Html\{Attribute\Custom\HasContent, Attribute\Input\HasForm, Attribute\Tag\HasFor, Base\AbstractElement};

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
        return $this->buildElement('label', $this->content);
    }
}
