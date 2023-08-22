<?php

declare(strict_types=1);

namespace PHPForge\Html\Base;

use InvalidArgumentException;
use PHPForge\Html\Attribute;
use PHPForge\Html\Attribute\Enum\DataAttributes;
use PHPForge\Html\Button;
use PHPForge\Html\Span;
use PHPForge\Html\Svg;
use PHPForge\Widget\AbstractWidget;

abstract class AbstractButtonToggle extends AbstractWidget
{
    use Attribute\Aria\HasAriaControls;
    use Attribute\Aria\HasAriaExpanded;
    use Attribute\Custom\HasToggle;
    use Attribute\HasData;
    use Attribute\HasStyle;
    use Attribute\Input\HasName;

    protected array $attributes = [];
    private bool $toggleSidebar = false;

    public function toggleSidebar(): self
    {
        $new = clone $this;
        $new->toggleSidebar = true;

        return $new;
    }

    protected function run(): string
    {
        $widget = $this->ariaControls($this->toggleId);

        if ($widget->toggleSidebar) {
            $widget = $widget->dataAttributes(
                [
                    DataAttributes::DATA_DRAWER_TARGET->value => $this->toggleId,
                    DataAttributes::DATA_DRAWER_TOGGLE->value => $this->toggleId,
                ],
            );
        } else {
            $widget = $widget->ariaExpanded('false');
            $widget = $widget->dataAttributes(
                [
                    DataAttributes::DATA_COLLAPSE_TOGGLE->value => $this->toggleId,
                ],
            );
        }

        $toggleAttributes = array_merge($widget->attributes, $widget->toggleAttributes);

        if ($widget->toggleId === '') {
            throw new InvalidArgumentException('The toogle id attribute is required for the "ButtonToggle::class".');
        }

        return Button::widget()
            ->attributes($toggleAttributes)
            ->content(
                Span::widget()->class('sr-only')->content('Open sidebar'),
                PHP_EOL,
                Svg::widget()->filePath(__DIR__ . '/Svg/toggle.svg'),
            )
            ->render();
    }
}
