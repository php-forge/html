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
    use Attribute\Aria\HasAriaLabel;
    use Attribute\Custom\HasAttributes;
    use Attribute\Custom\HasContent;
    use Attribute\HasClass;
    use Attribute\HasData;
    use Attribute\HasId;
    use Attribute\HasStyle;
    use Attribute\Input\HasName;

    protected array $attributes = [];
    private string $type = 'menu';

    public function alert(): static
    {
        return $this->type('alert');
    }

    public function sidebar(): static
    {
        return $this->type('sidebar');
    }

    /**
     * Generate the HTML representation of the element.
     *
     * @return string The HTML representation of the element.
     */
    protected function run(): string
    {
        $attributes = $this->attributes;
        $id = null;

        if (array_key_exists('id', $attributes) && is_string($attributes['id'])) {
            $id = $attributes['id'];
            unset($attributes['id']);
        }

        if ($id === null) {
            throw new InvalidArgumentException('The toogle id attribute is required for the "ButtonToggle::class".');
        }

        return match ($this->type) {
            'alert' => $this->renderAlertToggle($attributes, $id),
            'menu' => $this->renderMenuToggle($attributes, $id),
            'sidebar' => $this->renderSidebarToggle($attributes, $id),
        };
    }

    private function renderAlertToggle(array $attributes, string $id): string
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
                    DataAttributes::DATA_DISMISS_TARGET->value => $id,
                ],
            )
            ->render();
    }

    private function renderMenuToggle(array $attributes, string $id): string
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

        return $buttonToggle
            ->ariaControls($id)
            ->ariaExpanded('false')
            ->attributes($attributes)
            ->dataAttributes(
                [
                    DataAttributes::DATA_COLLAPSE_TOGGLE->value => $id,
                ],
            )
            ->render();
    }

    private function renderSidebarToggle(array $attributes, string $id): string
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

        return $buttonToggle
            ->ariaControls($id)
            ->attributes($attributes)
            ->dataAttributes(
                [
                    DataAttributes::DATA_DRAWER_TARGET->value => $id,
                    DataAttributes::DATA_DRAWER_TOGGLE->value => $id,
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
