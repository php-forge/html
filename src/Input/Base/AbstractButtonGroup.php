<?php

declare(strict_types=1);

namespace PHPForge\Html\Input\Base;

use PHPForge\Html\Attribute;
use PHPForge\Html\Input\Button;
use PHPForge\Widget\Element;

use function implode;

abstract class AbstractButtonGroup extends Element
{
    use Attribute\Custom\HasContainer;

    /**
     * @psalm-var Button[]
     */
    protected array $buttons = [];
    protected bool $individualContainer = false;

    /**
     * Returns a new instance specifying List of buttons. Each array element represents a single input button.
     *
     * @param array $values The list of buttons.
     *
     * @psalm-param Button[] $values
     */
    public function buttons(Button ...$values): static
    {
        $new = clone $this;
        $new->buttons = $values;

        return $new;
    }

    /**
     * Returns a new instance specifying if each button should be wrapped in a container.
     *
     * @param bool $value If true, each button will be wrapped in a container.
     */
    public function individualContainer(bool $value): static
    {
        $new = clone $this;
        $new->individualContainer = $value;

        return $new;
    }

    /**
     * This method is used to configure the widget with the provided default definitions.
     */
    protected function loadDefaultDefinitions(): array
    {
        return [
            'container()' => [true],
        ];
    }

    protected function run(): string
    {
        return $this->renderContainerTag(null, $this->renderButtons());
    }

    private function renderButtons(): string
    {
        $buttons = [];

        foreach ($this->buttons as $button) {
            $buttons[] = $button->container($this->individualContainer)->render();
        }

        return implode("\n", $buttons);
    }
}
