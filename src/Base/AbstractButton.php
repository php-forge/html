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

    protected string $tagName = 'button';
    private bool $container = false;
    private string $containerTag = 'div';

    protected function beforeRun(): bool
    {
        if (array_key_exists('type', $this->attributes) === false) {
            $this->attributes['type'] = 'button';
        }

        if (array_key_exists('type', $this->attributes) && $this->attributes['type'] === 'link') {
            unset($this->attributes['type']);
        }

        return parent::beforeRun();
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
