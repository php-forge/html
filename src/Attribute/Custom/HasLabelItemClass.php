<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

/**
 * Is used by widgets that implement label item class method.
 */
trait HasLabelItemClass
{
    protected string $labelItemClass = '';

    /**
     * Set a new label item class that will be used for the label item.
     *
     * @param string $value The label item class to be used for the label item.
     *
     * @return static A new instance of the current class with the specified label item class.
     */
    public function labelItemClass(string $value): static
    {
        $new = clone $this;
        $new->labelItemClass = $value;

        return $new;
    }
}
