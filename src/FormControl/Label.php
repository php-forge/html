<?php

declare(strict_types=1);

namespace PHPForge\Html\FormControl;

use PHPForge\Html\{Attribute\HasContent, Attribute\FormControl\HasForm, Base\AbstractElement};

/**
 * The `<label>` HTML element represents a caption for an item in a user interface.
 *
 * @link https://www.w3.org/TR/html52/sec-forms.html#the-label-element
 */
final class Label extends AbstractElement
{
    use HasContent;
    use HasForm;

    /**
     * Set the id of a labeled form-related element in the same document as the tag label element.
     *
     * The first element in the document with an id matching the value of the for attribute is the labeled control for
     * this label element if it's a labeled element.
     *
     * @param string|null $value The id of a labeled form-related element in the same document as the tag label
     * element. If null, the attribute will be removed.
     *
     * @return static A new instance of the current class with the specified for value.
     *
     * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/label.html#label.attrs.for
     */
    public function for(string $value = null): static
    {
        $new = clone $this;
        $new->attributes['for'] = $value;

        return $new;
    }

    protected function run(): string
    {
        if ($this->content === '') {
            return '';
        }

        return $this->buildElement('label', $this->content);
    }
}
