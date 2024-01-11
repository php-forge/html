<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

use PHPForge\Html\Helper\CssClass;
use PHPForge\Html\Input\Hidden;

use function array_merge;

/**
 * Is used by widgets which implement the unchecked method.
 */
trait HasUnchecked
{
    protected array $uncheckAttributes = [];
    protected mixed $uncheckValue = null;

    /**
     * Set the `HTML` attributes for unchecked elements.
     *
     * @param array $values Attribute values indexed by attribute names.
     *
     * @return static A new instance of the current class with the specified unchecked attributes.
     */
    public function uncheckAttributes(array $values): static
    {
        $new = clone $this;
        $new->uncheckAttributes = array_merge($this->uncheckAttributes, $values);

        return $new;
    }

    /**
     * Set the `CSS` class for the unchecked element.
     *
     * @param string $class The CSS class name.
     * @param bool $override If `true` the value will be overridden.
     *
     * @return static A new instance of the current class with the specified unchecked class.
     */
    public function uncheckClass(string $class, bool $override = false): static
    {
        $new = clone $this;
        CssClass::add($new->uncheckAttributes, $class, $override);

        return $new;
    }

    /**
     * Set the `HTML` id for the unchecked element.
     *
     * @param string $value The name of the unchecked element.
     *
     * @return static A new instance of the current class with the specified unchecked name.
     */
    public function uncheckName(string $value): static
    {
        $new = clone $this;
        $new->uncheckAttributes['name'] = $value;

        return $new;
    }

    /**
     * set the value content attribute gives the default value of the unchecked field.
     *
     * @param mixed $value The value of the unchecked field.
     *
     * @return static A new instance of the current class with the specified unchecked value.
     */
    public function uncheckValue(mixed $value): static
    {
        $new = clone $this;
        $new->uncheckValue = $value;

        return $new;
    }

    /**
     * Generate the HTML representation of the unchecked element.
     *
     * @return string The HTML representation of the unchecked element.
     */
    private function renderUncheckTag(): string
    {
        if ($this->uncheckValue === null) {
            return '';
        }

        return Hidden::widget()
            ->attributes($this->uncheckAttributes)
            ->id(null)
            ->value($this->uncheckValue)
            ->render();
    }
}
