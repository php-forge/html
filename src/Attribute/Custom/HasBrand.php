<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

use PHPForge\Html\Helper\CssClass;
use PHPForge\Html\Helper\Encode;
use PHPForge\Widget\WidgetInterface;

/**
 * Is used by components that implement a brand methods.
 */
trait HasBrand
{
    private bool $brandContainer = false;
    private array $brandContainerAttributes = [];
    private string $brandContainerClass = '';
    private string $brandContainerTag = 'div';
    private string $brandImage = '';
    private string $brandLink = '';
    private array $brandLinkAttributes = [];
    private string $brandText = '';
    private string $brandTemplate = "\n{image}\n{text}\n";
    private string $brandToggle = '';


    /**
     * Returns a new instance, if enabled or disabled the item container tag `<div>`.
     *
     * @param bool $value If enabled or disabled the item container tag `<div>`.
     * Default is `false`.
     */
    public function brandContainer(bool $value): static
    {
        $new = clone $this;
        $new->brandContainer = $value;

        return $new;
    }

    /**
     * Returns a new instance specifying the `HTML` attributes for the brand container.
     *
     * @param array $values The `HTML` attributes for the brand container.
     */
    public function brandContainerAttributes(array $values): static
    {
        $new = clone $this;
        $new->brandContainerAttributes = $values;

        return $new;
    }

    /**
     * Returns a new instance specifying the `CSS` class for the brand container.
     *
     * @param string $value The `CSS` class for the brand container.
     */
    public function brandContainerClass(string $value): static
    {
        $new = clone $this;
        CssClass::add($new->brandContainerAttributes, $value);

        return $new;
    }

    /**
     * Returns a new instance specifying the brand container tag.
     *
     * @param string $value The brand container tag.
     */
    public function brandContainerTag(string $value): static
    {
        $new = clone $this;
        $new->brandContainerTag = $value;

        return $new;
    }

    /**
     * Returns a new instance specifying the brand image.
     *
     * @param string|WidgetInterface $value The brand image.
     */
    public function brandImage(string|WidgetInterface $value): static
    {
        $new = clone $this;
        $new->brandImage = Encode::create()->santizeXSS($value);

        return $new;
    }

    /**
     * Returns a new instance specifying the brand link.
     *
     * @param string $value The brand link.
     */
    public function brandLink(string $value): static
    {
        $new = clone $this;
        $new->brandLink = $value;

        return $new;
    }

    /**
     * Returns a new instance specifying the `HTML` attributes for the brand link.
     *
     * @param array $value The `HTML` attributes for the brand link.
     */
    public function brandLinkAttributes(array $value): static
    {
        $new = clone $this;
        $new->brandLinkAttributes = $value;

        return $new;
    }

    /**
     * Returns a new instance specifying the `CSS` class for the brand link.
     *
     * @param string $value The `CSS` class for the brand link.
     */
    public function brandLinkClass(string $value): static
    {
        $new = clone $this;
        CssClass::add($new->brandLinkAttributes, $value);

        return $new;
    }

    /**
     * Returns a new instance specifying the brand template.
     *
     * The following tokens are recognized: `{image}` and `{text}`.
     *
     * @param string $value The brand template.
     */
    public function brandTemplate(string $value): static
    {
        $new = clone $this;
        $new->brandTemplate = $value;

        return $new;
    }

    /**
     * Returns a new instance specifying the brand text.
     *
     * @param string|WidgetInterface $value The brand text.
     */
    public function brandText(string|WidgetInterface $value): static
    {
        $new = clone $this;
        $new->brandText = Encode::create()->santizeXSS($value);

        return $new;
    }

    public function brandToggle(string|WidgetInterface $value): static
    {
        $new = clone $this;
        $new->brandToggle = Encode::create()->santizeXSS($value);

        return $new;
    }
}
