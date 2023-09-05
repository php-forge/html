<?php

declare(strict_types=1);

namespace PHPForge\Html\Base;

use InvalidArgumentException;
use PHPForge\Html\Attribute;
use PHPForge\Html\Attribute\Enum\DataAttributes;
use PHPForge\Html\Button;
use PHPForge\Html\ButtonLink;
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
    use Attribute\Aria\HasAriaLabel;
    use Attribute\Custom\HasAttributes;
    use Attribute\Custom\HasContent;
    use Attribute\HasClass;
    use Attribute\HasData;
    use Attribute\HasId;
    use Attribute\HasStyle;
    use Attribute\Input\HasName;

    protected array $attributes = [];
    protected string $type = 'menu';

    /**
     * Set type toogle for alert component.
     *
     * @return static A new instance of the current class with the specified toggle for alert component.
     */
    public function alert(): static
    {
        return $this->type('alert');
    }

    /**
     * Set type toogle for dropdown component.
     *
     * @return static A new instance of the current class with the specified toggle for dropdown component.
     */
    public function dropdown(): static
    {
        return $this->type('dropdown');
    }

    /**
     * Set type toogle for menu component.
     *
     * @return static A new instance of the current class with the specified toggle for menu component.
     */
    public function sidebar(): static
    {
        return $this->type('sidebar');
    }

    protected function beforeRun(): bool
    {
        if ($this->id === null || $this->id === '') {
            throw new InvalidArgumentException('The toogle id attribute is required for the "ButtonToggle::class".');
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
        $attributes = $this->attributes;

        return match ($this->type) {
            'alert' => $this->renderAlertToggle($attributes),
            'dropdown' => $this->renderDropdownTogle($attributes),
            'menu' => $this->renderMenuToggle($attributes),
            'sidebar' => $this->renderSidebarToggle($attributes),
        };
    }

    private function renderAlertToggle(array $attributes): string
    {
        $buttonToggle = Button::widget();
        $content = [
            PHP_EOL,
            Span::widget()->class('sr-only')->content('Close'),
            PHP_EOL,
            Svg::widget()->filePath(__DIR__ . '/Svg/circle-close.svg'),
            PHP_EOL,
        ];

        $buttonToggle = match ($this->content) {
            '' => $buttonToggle->content(...$content),
            default => $buttonToggle->content(PHP_EOL, $this->content, PHP_EOL),
        };

        return $buttonToggle
            ->ariaLabel('Close')
            ->attributes($attributes)
            ->dataAttributes(
                [
                    DataAttributes::DATA_DISMISS_TARGET => $this->id,
                ],
            )
            ->render();
    }

    private function renderDropdownTogle(array $attributes): string
    {
        $buttonToggle = ButtonLink::widget();
        $content = [
            PHP_EOL,
            Span::widget()->class('sr-only')->content('Toggle dropdown'),
            PHP_EOL,
            Svg::widget()->filePath(__DIR__ . '/Svg/toggle.svg'),
            PHP_EOL,
        ];

        $buttonToggle = match ($this->content) {
            '' => $buttonToggle->content(...$content),
            default => $buttonToggle->content(PHP_EOL, $this->content, PHP_EOL),
        };

        return $buttonToggle
            ->attributes($attributes)
            ->dataAttributes([DataAttributes::DATA_DROPDOWN_TOGGLE => $this->id])
            ->render();
    }

    private function renderMenuToggle(array $attributes): string
    {
        $buttonToggle = Button::widget();
        $content = [
            PHP_EOL,
            Span::widget()->class('sr-only')->content('Open main menu'),
            PHP_EOL,
            Svg::widget()->filePath(__DIR__ . '/Svg/toggle.svg'),
            PHP_EOL,
        ];

        $buttonToggle = match ($this->content) {
            '' => $buttonToggle->content(...$content),
            default => $buttonToggle->content(PHP_EOL, $this->content, PHP_EOL),
        };

        if ($this->id !== null) {
            $buttonToggle = $buttonToggle->ariaControls($this->id);
        }

        return $buttonToggle
            ->ariaExpanded('false')
            ->attributes($attributes)
            ->dataAttributes([DataAttributes::DATA_COLLAPSE_TOGGLE => $this->id])
            ->render();
    }

    private function renderSidebarToggle(array $attributes): string
    {
        $buttonToggle = Button::widget();
        $content = [
            PHP_EOL,
            Span::widget()->class('sr-only')->content('Open sidebar'),
            PHP_EOL,
            Svg::widget()->filePath(__DIR__ . '/Svg/toggle.svg'),
            PHP_EOL,
        ];

        $buttonToggle = match ($this->content) {
            '' => $buttonToggle->content(...$content),
            default => $buttonToggle->content(PHP_EOL, $this->content, PHP_EOL),
        };

        if ($this->id !== null) {
            $buttonToggle = $buttonToggle->ariaControls($this->id);
        }

        return $buttonToggle
            ->attributes($attributes)
            ->dataAttributes(
                [
                    DataAttributes::DATA_DRAWER_TARGET => $this->id,
                    DataAttributes::DATA_DRAWER_TOGGLE => $this->id,
                ],
            )
            ->render();
    }

    private function type(string $type): static
    {
        $new = clone $this;
        $new->type = $type;

        return $new;
    }
}
