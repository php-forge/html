<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

use InvalidArgumentException;
use PHPForge\Html\Helper\CssClass;
use PHPForge\Html\Helper\Encode;
use PHPForge\Widget\ElementInterface;

use function array_merge;
use function implode;
use function in_array;
use function sprintf;

/**
 * Is used by widgets that implement the toggle methods.
 */
trait HasToggle
{
    private bool $toggle = true;
    private array $toggleAttributes = [];
    private string $toggleClass = '';
    private string $toggleContent = '';
    private string $toggleId = '';
    private string $toggleSvg = '';
    private string $toggleType = 'button';

    /**
     * Enable or disable the toggle.
     *
     * @param bool $value `true` to enable the toggle, `false` to disable it.
     *
     * @return static A new instance of the current class with the specified toggle value.
     */
    public function toggle(bool $value): static
    {
        $new = clone $this;
        $new->toggle = $value;

        return $new;
    }

    /**
     * Set the `HTML` attributes for the toggle.
     *
     * @return static A new instance of the current class with the specified toggle attributes.
     */
    public function toggleAttributes(array $value): static
    {
        $new = clone $this;
        $new->toggleAttributes = array_merge($value, $new->toggleAttributes);

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
        CssClass::add($new->toggleAttributes, $value);

        return $new;
    }

    /**
     * Set the `HTML` content for the toggle.
     *
     * @param string|ElementInterface ...$values The `HTML` toggle button content.
     *
     * @return static A new instance of the current class with the specified toggle content.
     */
    public function toggleContent(string|ElementInterface ...$values): static
    {
        $new = clone $this;
        $new->toggleContent = Encode::create()->santizeXSS(...$values);

        return $new;
    }

    /**
     * Sets the toggle data attribute.
     *
     * @param string $name The data attribute name, without the `data-` prefix.
     *
     * @return static A new instance of the current class with the specified toggle data attribute.
     */
    public function toggleDataAttribute(string $name, string $value): static
    {
        $allowedDataAttributes = [
            'collapse-toggle',
            'drawer-target',
            'drawer-toggle',
            'dropdown-toggle',
            'dropdown-trigger',
        ];

        if (in_array($name, $allowedDataAttributes, true) === false) {
            throw new InvalidArgumentException(
                sprintf(
                    'The data attribute `%s` is not allowed. Allowed data attributes are: %s',
                    $name,
                    implode(', ', $allowedDataAttributes)
                ),
            );
        }

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
     * Set the toggle on click event.
     *
     * @param string $value The toggle on click event.
     *
     * @return static A new instance of the current class with the specified toggle on click event.
     */
    public function toggleOnClick(string $value): static
    {
        $new = clone $this;
        $new->toggleAttributes['onclick'] = $value;

        return $new;
    }

    /**
     * Set the svg for the toggle.
     *
     * @param string|ElementInterface $value The svg for the toggle.
     *
     * @return static A new instance of the current class with the specified svg for the toggle.
     */
    public function toggleSvg(string|ElementInterface $value): static
    {
        $new = clone $this;
        $new->toggleSvg = Encode::create()->santizeXSS($value);

        return $new;
    }

    /**
     * Set the toggle type.
     *
     * @param string $value The toggle type. Default: `button`.
     *
     * @return static A new instance of the current class with the specified toggle type.
     */
    public function toggleType(string $value): static
    {
        $new = clone $this;
        $new->toggleType = $value;

        return $new;
    }
}
