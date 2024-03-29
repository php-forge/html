<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Component;

use InvalidArgumentException;
use PHPForge\Html\{Attribute\Custom\HasValidateInList, Helper\Sanitize, Interop\RenderInterface, Tag};

use function array_merge;

/**
 * Is used by widgets that implement the toggle collection.
 */
trait HasToggleCollection
{
    use HasValidateInList;

    protected bool $isToggle = true;
    protected array $toggleAttributes = [];
    protected string $toggleClass = '';
    protected bool $toggleClassOverride = false;
    protected string $toggleContent = '';
    protected string $toggleTag = 'span';
    protected string $toggleId = '';
    protected string $togglePrefix = '';
    protected string $toggleSuffix = '';
    protected string $toggleTemplate = '{prefix}\n{tag}\n{suffix}';

    /**
     * Disable the toggle.
     *
     * @return static A new instance of the current class with the specified toggle value.
     */
    public function notToggle(): static
    {
        $new = clone $this;
        $new->isToggle = false;

        return $new;
    }

    /**
     * Set the `HTML` attributes for the toggle.
     *
     * @param array $values Attribute values indexed by attribute names.
     *
     * @return static A new instance of the current class with the specified toggle attributes.
     */
    public function toggleAttributes(array $values): static
    {
        $new = clone $this;
        $new->toggleAttributes = array_merge($values, $new->toggleAttributes);

        return $new;
    }

    /**
     * Set the `CSS` class for the toggle.
     *
     * @param string $value The `CSS` class for the toggle.
     *
     * @return static A new instance of the current class with the specified toggle class.
     */
    public function toggleClass(string $value): static
    {
        $new = clone $this;
        $new->toggleClass = $value;

        return $new;
    }

    /**
     * Set the `HTML` content for the toggle.
     *
     * @param RenderInterface|string ...$values The `HTML` toggle button content.
     *
     * @return static A new instance of the current class with the specified toggle content.
     */
    public function toggleContent(string|RenderInterface ...$values): static
    {
        $new = clone $this;
        $new->toggleContent = Sanitize::html(...$values);

        return $new;
    }

    /**
     * Sets the toggle data attribute.
     *
     * @param string $name The data attribute name, without the `data-` prefix.
     * @param string $value The data attribute value.
     *
     * @throws InvalidArgumentException If the name is not one of: "bs-toggle", "bs-target", "collapse-toggle",
     * "drawer-target", "drawer-toggle", "dropdown-toggle", "dropdown-trigger".
     *
     * @return static A new instance of the current class with the specified toggle data attribute.
     */
    public function toggleDataAttribute(string $name, string $value): static
    {
        $this->validateInList(
            $name,
            'Invalid value "%s" for the data attribute. Allowed values are: "%s".',
            'bs-toggle',
            'bs-target',
            'collapse-toggle',
            'drawer-target',
            'drawer-toggle',
            'dropdown-toggle',
            'dropdown-trigger',
        );

        $new = clone $this;
        $new->toggleAttributes["data-$name"] = $value;

        return $new;
    }

    /**
     * Set the ID.
     *
     * @param string $value The toggle ID.
     *
     * @return static A new instance of the current class with the specified toggle ID.
     */
    public function toggleId(string $value): static
    {
        $new = clone $this;
        $new->toggleId = $value;

        return $new;
    }

    /**
     * Set the toggle prefix.
     *
     * @param string $value The toggle prefix.
     *
     * @return static A new instance of the current class with the specified toggle prefix.
     */
    public function togglePrefix(string $value): static
    {
        $new = clone $this;
        $new->togglePrefix = $value;

        return $new;
    }

    /**
     * Set the toggle suffix.
     *
     * @param string $value The toggle suffix.
     *
     * @return static A new instance of the current class with the specified toggle suffix.
     */
    public function toggleSuffix(string $value): static
    {
        $new = clone $this;
        $new->toggleSuffix = $value;

        return $new;
    }

    /**
     * Set the toggle tag name.
     *
     * @param string $value The tag name for the toggle element.
     *
     * @throws InvalidArgumentException If the toggle tag is an empty string.
     *
     * @return static A new instance of the current class with the specified toggle tag.
     */
    public function toggleTag(string $value): static
    {
        if ($value === '') {
            throw new InvalidArgumentException('The toggle tag must be a non-empty string.');
        }

        $new = clone $this;
        $new->toggleTag = $value;

        return $new;
    }

    private function renderToggleTag(): string
    {
        if ($this->isToggle === false || ($this->toggleContent === '' && $this->toggleClass === '')) {
            return '';
        }

        return Tag::widget()
            ->attributes($this->toggleAttributes)
            ->class($this->toggleClass)
            ->content($this->toggleContent)
            ->id($this->toggleId)
            ->prefix($this->togglePrefix)
            ->suffix($this->toggleSuffix)
            ->tagName($this->toggleTag)
            ->template($this->toggleTemplate)
            ->render();
    }
}
