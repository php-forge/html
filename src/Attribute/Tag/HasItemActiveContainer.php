<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Tag;

use InvalidArgumentException;
use PHPForge\Html\Helper\CssClass;

/**
 * Is used by widgets that implement the item active container methods.
 */
trait HasItemActiveContainer
{
    protected array $itemActiveContainerAttributes = [];

    public function itemActiveContainer(bool $value): static
    {
        $new = clone $this;
        $new->itemActiveContainer = $value;

        return $new;
    }

    public function itemActiveContainerAttributes(array $value): static
    {
        $new = clone $this;
        $new->itemActiveContainerAttributes = $value;

        return $new;
    }

    public function itemActiveContainerClass(string $value, bool $override = false): static
    {
        $new = clone $this;
        CssClass::add($new->itemActiveContainerAttributes, $value, $override);

        return $new;
    }

    public function itemActiveContainerTag(string $value): static
    {
        if ($value === '') {
            throw new InvalidArgumentException(
                sprintf(
                    'The item container tag must be a non-empty string. "%s" given.',
                    $value,
                ),
            );
        }

        $new = clone $this;
        $new->itemActiveContainerTag = $value;

        return $new;
    }
}
