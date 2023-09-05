<?php

declare(strict_types=1);

namespace PHPForge\Html\Base;

use PHPForge\Html\Attribute;
use PHPForge\Html\Div;

/**
 * Provides a foundation for creating HTML `button` elements with various attributes and content.
 */
abstract class AbstractButton extends AbstractElement
{
    use Attribute\Aria\HasAriaControls;
    use Attribute\Aria\HasAriaDisabled;
    use Attribute\Aria\HasAriaExpanded;
    use Attribute\Aria\HasAriaLabel;
    use Attribute\Aria\HasRole;
    use Attribute\Custom\HasContainer;
    use Attribute\HasData;
    use Attribute\Input\HasType;

    protected array $attributes = ['type' => 'button'];
    protected bool $container = false;
    protected string $containerTag = 'div';
    protected string $tagName = 'button';

    /**
     * Set the button type to `submit`.
     *
     * @return static A new instance of the current class with the specified type value.
     */
    public function submit(): static
    {
        return $this->type('submit');
    }

    /**
     * Set the button type to `reset`.
     *
     * @return static A new instance of the current class with the specified type value.
     */
    public function reset(): static
    {
        return $this->type('reset');
    }

    /**
     * Generate the HTML representation of the element.
     *
     * @return string The HTML representation of the element.
     */
    protected function run(): string
    {
        $buttonHtml = parent::run();

        return match ($this->container) {
            true => Div::widget()->attributes($this->containerAttributes)->content($buttonHtml)->render(),
            default => $buttonHtml,
        };
    }
}
