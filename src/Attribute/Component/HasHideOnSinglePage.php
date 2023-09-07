<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Component;

/**
 * Is used by widgets which implement the hideOnSinglePage method.
 */
trait HasHideOnSinglePage
{
    protected bool $hideOnSinglePage = false;

    /**
     * Set the value indicating whether to hide the widget when there is only one page.
     *
     * @param bool $value The value indicating whether to hide the widget when there is only one page.
     *
     * @return static A new instance of the current class with the specified value indicating whether to hide the widget
     * when there is only one page.
     */
    public function hideOnSinglePage(bool $value): static
    {
        $new = clone $this;
        $new->hideOnSinglePage = $value;

        return $new;
    }
}
