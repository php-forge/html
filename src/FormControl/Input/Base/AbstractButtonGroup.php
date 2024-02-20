<?php

declare(strict_types=1);

namespace PHPForge\Html\FormControl\Input\Base;

use PHPForge\Html\Attribute\Custom\HasContainer;
use PHPForge\Html\FormControl\Input\{Button, Reset, Submit};
use PHPForge\Widget\Element;

use function implode;

abstract class AbstractButtonGroup extends Element
{
    use HasContainer;

    /**
     * @psalm-var Button[]|Reset[]|Submit[]
     */
    protected array $buttons = [];
    protected bool $individualContainer = false;

    /**
     * Returns a new instance specifying List of buttons. Each array element represents a single input button.
     *
     * @param array $values The list of buttons.
     *
     * @psalm-param Button[]|Reset[]|Submit[] $values
     */
    public function buttons(Button|Reset|Submit ...$values): static
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
