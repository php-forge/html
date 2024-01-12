<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Custom;

use InvalidArgumentException;
use PHPForge\Html\Helper\CssClass;
use PHPForge\Html\Tag;

use function array_key_exists;
use function implode;

/**
 * Is used by widgets that implement container methods.
 */
trait HasContainer
{
    protected array $containerAttributes = [];
    protected bool $container = false;
    protected string $containerTag = 'div';

    /**
     * Enable or disable the container tag.
     *
     * @param bool $value `true` to enable the container, `false` to disable.
     *
     * @return static A new instance of the current class with the specified container.
     */
    public function container(bool $value): static
    {
        $new = clone $this;
        $new->container = $value;

        return $new;
    }

    /**
     * Set the `HTML` attributes for the container.
     *
     * @param array $values Attribute values indexed by attribute names.
     *
     * @return static A new instance of the current class with the specified container attributes.
     */
    public function containerAttributes(array $values = []): static
    {
        $new = clone $this;
        $new->containerAttributes = $values;

        return $new;
    }

    /**
     * Set the `CSS` class for the container.
     *
     * @param string $value The CSS class name.
     * @param bool $override If `true` the value will be overridden.
     *
     * @return static A new instance of the current class with the specified container class.
     */
    public function containerClass(string $value, bool $override = false): static
    {
        $new = clone $this;
        CssClass::add($new->containerAttributes, $value, $override);

        return $new;
    }

    /**
     * Set the container tag name.
     *
     * @param string $value The tag name for the container element.
     *
     * @throws InvalidArgumentException If the container tag is an empty string.
     *
     * @return static A new instance of the current class with the specified container tag.
     */
    public function containerTag(string $value): static
    {
        if ($value === '') {
            throw new InvalidArgumentException('The container tag must be a non-empty string.');
        }

        $new = clone $this;
        $new->containerTag = $value;

        return $new;
    }

    /**
     * Get the container id.
     *
     * @return string The container id.
     */
    public function getContainerId(): string|null
    {
        $id = null;

        if (array_key_exists('id', $this->containerAttributes) && is_string($this->containerAttributes['id'])) {
            $id = $this->containerAttributes['id'];
        }

        return $id;
    }

    protected function renderContainerTag(string|null $id, string ...$content): string
    {
        return match ($this->container) {
            true => Tag::widget()
                ->attributes($this->containerAttributes)
                ->content(...$content)
                ->id($id)
                ->tagName($this->containerTag)
                ->render(),
            default => implode(PHP_EOL, $content),
        };
    }
}
