<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Tag;

/**
 * Is used by widgets that implement the groups method.
 */
trait HasGroup
{
    protected array $groups = [];

    /**
     * Specifying the `<optgroup>` tags.
     *
     * The structure of this is similar to that of attributes, except that the array keys represent the optgroup
     * labels specified in $items.
     *
     * ```php
     * [
     *     'groups' => [
     *         '1' => ['label' => 'Chile'],
     *         '2' => ['label' => 'Russia']
     *     ],
     * ];
     * ```
     *
     * @param array $values The optgroup labels specified in items.
     *
     * @return static A new instance of the current class with the specified groups value.
     *
     * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/optgroup.html#optgroup
     */
    public function groups(array $values = []): static
    {
        $new = clone $this;
        $new->groups = $values;

        return $new;
    }
}
