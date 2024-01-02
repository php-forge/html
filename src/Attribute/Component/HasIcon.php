<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Component;

use InvalidArgumentException;
use PHPForge\Html\Helper\CssClass;
use PHPForge\Html\Svg;
use PHPForge\Html\Tag;

/**
 * Is used by widgets that implement the icon methods.
 */
trait HasIcon
{
    protected bool $icon = true;
    protected array $iconAttributes = [];
    protected string $iconClass = '';
    protected bool $iconContainer = false;
    protected array $iconContainerAttributes = [];
    protected string $iconContainerTag = 'div';
    protected string $iconContent = '';
    protected string $iconFilePath = '';
    protected bool|string $iconTag = 'i';

    /**
     * @return array The `HTML` attributes of the icon of the menu item.
     */
    public function getIconAttributes(): array
    {
        return $this->iconAttributes;
    }

    /**
     * @return array The `HTML` attributes of the icon container of the menu item.
     */
    public function getIconContainerAttributes(): array
    {
        return $this->iconContainerAttributes;
    }

    /**
     * @return string The icon of the menu item.
     */
    public function getIconContent(): string
    {
        return $this->iconContent;
    }

    /**
     * Enable or disable the icon.
     *
     * @param bool $value `true` to enable the icon, `false` to disable it.
     *
     * @return static A new instance of the current class with the specified icon value.
     */
    public function icon(bool $value): static
    {
        $new = clone $this;
        $new->icon = $value;

        return $new;
    }

    /**
     * Set the `HTML` attributes for the icon.
     *
     * @param array $values Attribute values indexed by attribute names.
     *
     * @return static A new instance of the current class with the specified icon attributes.
     */
    public function iconAttributes(array $values): static
    {
        $new = clone $this;
        $new->iconAttributes = $values;

        return $new;
    }

    /**
     * Set the `CSS` class for the icon.
     *
     * @param string $value The icon CSS class.
     *
     * @return static A new instance of the current class with the specified icon CSS class.
     */
    public function iconClass(string $value): static
    {
        $new = clone $this;
        $new->iconClass = $value;

        return $new;
    }

    /**
     * Enable or disable the icon container tag.
     *
     * @param bool $value The value indicating whether to add a div tag to the icon extra wrapper.
     */
    public function iconContainer(bool $value): static
    {
        $new = clone $this;
        $new->iconContainer = $value;

        return $new;
    }

    /**
     * Set the icon container tag name.
     *
     * @param string $value The tag name for the icon container element.
     *
     * @throws InvalidArgumentException If the icon container tag is an empty string.
     *
     * @return static A new instance of the current class with the specified icon container tag.
     */
    public function iconContainerTag(string $value): static
    {
        if ($value === '') {
            throw new InvalidArgumentException('The icon container tag must be a non-empty string.');
        }

        $new = clone $this;
        $new->iconContainerTag = $value;

        return $new;
    }

    /**
     * Set the `HTML` attributes for the icon container.
     *
     * @param array $values Attribute values indexed by attribute names.
     *
     * @return static A new instance of the current class with the specified icon container attributes.
     */
    public function iconContainerAttributes(array $values): static
    {
        $new = clone $this;
        $new->iconContainerAttributes = $values;

        return $new;
    }

    /**
     * Set the `CSS` class for the icon container.
     *
     * @param string $value The CSS class name.
     * @param bool $override If `true` the value will be overridden.
     *
     * @return static A new instance of the current class with the specified icon container CSS class.
     */
    public function iconContainerClass(string $value, bool $override = false): static
    {
        $new = clone $this;
        CssClass::add($new->iconContainerAttributes, $value, $override);

        return $new;
    }

    /**
     * Set the icon `HTML` content.
     *
     * @param string $value The icon `HTML` content.
     *
     * @return static A new instance of the current class with the specified icon content.
     */
    public function iconContent(string $value): static
    {
        $new = clone $this;
        $new->iconContent = $value;

        return $new;
    }

    /**
     * Set the icon file path.
     *
     * @param string $value The icon file path.
     *
     * @return static A new instance of the current class with the specified icon file path.
     */
    public function iconFilePath(string $value): static
    {
        $new = clone $this;
        $new->iconFilePath = $value;

        return $new;
    }

    /**
     * Set the icon tag name.
     *
     * @param bool|string $value The tag name for the icon element. if `false` the icon content will be used.
     *
     * @throws InvalidArgumentException If the icon tag is an empty string.
     *
     * @return static A new instance of the current class with the specified icon tag. If `false` the icon content
     * will be used.
     */
    public function iconTag(bool|string $value): static
    {
        if ($value === '') {
            throw new InvalidArgumentException('The icon tag must be a non-empty string.');
        }

        $new = clone $this;
        $new->iconTag = $value;

        return $new;
    }

    private function renderIconTag(): string
    {
        if (
            $this->icon === false ||
            ($this->iconClass === '' && $this->iconContent === '' && $this->iconFilePath === '')
        ) {
            return '';
        }

        $iconTag = match ($this->iconTag) {
            false => $this->iconContent,
            'svg' => Svg::widget()
                ->attributes($this->iconAttributes)
                ->class($this->iconClass)
                ->content($this->iconContent)
                ->filePath($this->iconFilePath)
                ->render(),
            default => Tag::widget()
                ->attributes($this->iconAttributes)
                ->class($this->iconClass)
                ->content($this->iconContent)
                ->tagName($this->iconTag)
                ->render(),
        };

        return match ($this->iconContainer) {
            true => Tag::widget()
                ->attributes($this->iconContainerAttributes)
                ->content($iconTag)
                ->tagName($this->iconContainerTag)
                ->render(),
            default => $iconTag,
        };
    }
}
