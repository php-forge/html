<?php

declare(strict_types=1);

namespace PHPForge\Html;

/**
 * The `<label>` HTML element represents a caption for an item in a user interface.
 *
 * @link https://www.w3.org/TR/html52/sec-forms.html#the-label-element
 */
final class Label extends Base\AbstractElement
{
    use Attribute\Input\HasForm;
    use Attribute\Tag\HasFor;

    protected function run(): string
    {
        return $this->buildElement('label');
    }
}
