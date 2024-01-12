<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

use InvalidArgumentException;
use PHPForge\Html\Helper\CssClass;
use PHPForge\Html\Tag;

use function array_key_exists;
use function implode;

/**
 * Is used by widgets that implement containerTemplate methods.
 */
trait HasContainerTemplate
{
    protected string $containerTemplate = '';

    /**
     * Set the container template.
     *
     * @param string $template The template for the container.
     *
     * @return static A new instance of the current class with the specified container template.
     */
    public function containerTemplate(string $template): static
    {
        $new = clone $this;
        $new->containerTemplate = $template;

        return $new;
    }
}
