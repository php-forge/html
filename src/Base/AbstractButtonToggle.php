<?php

declare(strict_types=1);

namespace PHPForge\Html\Base;

use InvalidArgumentException;
use PHPForge\Html\Attribute;
use PHPForge\Html\Attribute\Enum\DataAttributes;
use PHPForge\Html\Button;
use PHPForge\Html\Span;
use PHPForge\Html\Svg;
use PHPForge\Widget\Element;

/**
 * Provides a foundation for creating HTML `button` toggle elements with various attributes and content.
 */
abstract class AbstractButtonToggle extends Element
{
    use Attribute\Aria\HasAriaControls;
    use Attribute\Aria\HasAriaExpanded;
    use Attribute\Custom\HasAttributes;
    use Attribute\Custom\HasContent;
    use Attribute\HasClass;
    use Attribute\HasData;
    use Attribute\HasId;
    use Attribute\HasStyle;
    use Attribute\Input\HasName;

    protected array $attributes = [];
    private bool $sidebar = false;

    public function sidebar(): self
    {
        $new = clone $this;
        $new->sidebar = true;

        return $new;
    }

    /**
     * Generate the HTML representation of the element.
     *
     * @return string The HTML representation of the element.
     */
    protected function run(): string
    {
        $attributes = $this->attributes;
        $buttonToggle = Button::widget();
        $id = null;
        $sidebarContent = $this->sidebar ? 'Open sidebar' : 'Open main menu';

        if (array_key_exists('id', $attributes) && is_string($attributes['id'])) {
            $id = $attributes['id'];

            unset($attributes['id']);
        }

        if ($id === null) {
            throw new InvalidArgumentException('The toogle id attribute is required for the "ButtonToggle::class".');
        }

        $buttonToggle = match ($this->content) {
            '' => $buttonToggle->content(
                PHP_EOL,
                Span::widget()->class('sr-only')->content($sidebarContent),
                PHP_EOL,
                Svg::widget()->filePath(__DIR__ . '/Svg/toggle.svg'),
                PHP_EOL,
            ),
            default => $buttonToggle->content(PHP_EOL . $this->content . PHP_EOL),
        };

        $buttonToggle = $buttonToggle->ariaControls($id);

        $buttonToggle = match ($this->sidebar) {
            true => $buttonToggle->dataAttributes(
                [
                    DataAttributes::DATA_DRAWER_TARGET->value => $id,
                    DataAttributes::DATA_DRAWER_TOGGLE->value => $id,
                ],
            ),
            default => $buttonToggle->ariaExpanded('false')->dataAttributes(
                [
                    DataAttributes::DATA_COLLAPSE_TOGGLE->value => $id,
                ],
            ),
        };

        return $buttonToggle->attributes($attributes)->render();
    }
}
