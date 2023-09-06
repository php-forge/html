<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Component;

use PHPForge\Html\Helper\CssClass;

/**
 * Is used by widgets which implement the summary methods.
 */
trait HasSummary
{
    protected array $summaryAttributes = [];
    protected string $summaryLabel = 'Page ';
    protected string $summarySeparator = ' of ';

    /**
     * Set the `HTML` attributes for summary container.
     *
     * @param array $values Attribute values indexed by attribute names.
     *
     * @return static A new instance of the current class with the specified attributes for summary container.
     */
    public function summaryAttributes(array $values): static
    {
        $new = clone $this;
        $new->summaryAttributes = $values;

        return $new;
    }

    /**
     * Set the `CSS` `HTML` class attribute for summary container.
     *
     * @param string $value The `CSS` attribute for summary container.
     *
     * @return static A new instance of the current class with the specified class value for summary container.
     */
    public function summaryClass(string $value): static
    {
        $new = clone $this;
        CssClass::add($new->summaryAttributes, $value);

        return $new;
    }

    /**
     * Set the label text for summary current page.
     *
     * @param string $value The label text for summary current page. Default value is `Page `.
     *
     * @return static A new instance of the current class with the specified label text for summary current page.
     */
    public function summaryLabel(string $value): static
    {
        $new = clone $this;
        $new->summaryLabel = $value;

        return $new;
    }

    /**
     * Set the separator text for summary current page.
     *
     * @param string $value The separator text for summary current page. Default value is ` of `.
     *
     * @return static A new instance of the current class with the specified separator text for summary current page.
     */
    public function summarySeparator(string $value): static
    {
        $new = clone $this;
        $new->summarySeparator = $value;

        return $new;
    }
}
