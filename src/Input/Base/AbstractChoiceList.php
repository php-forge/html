<?php

declare(strict_types=1);

namespace PHPForge\Html\Input\Base;

use PHPForge\Html\Attribute;
use PHPForge\Html\Input\Checkbox;
use PHPForge\Html\Input\InputInterface;
use PHPForge\Html\Input\LabelInterface;
use PHPForge\Html\Input\Radio;
use PHPForge\Html\Label;
use PHPForge\Html\Tag;
use PHPForge\Widget\Element;

abstract class AbstractChoiceList extends Element implements InputInterface, LabelInterface
{
    use Attribute\Aria\HasAriaDescribedBy;
    use Attribute\Aria\HasAriaLabel;
    use Attribute\CanBeAutofocus;
    use Attribute\Custom\HasAttributes;
    use Attribute\Custom\HasContainer;
    use Attribute\Custom\HasLabel;
    use Attribute\Custom\HasSeparator;
    use Attribute\Custom\HasWidgetValidation;
    use Attribute\HasClass;
    use Attribute\HasId;
    use Attribute\HasTabindex;
    use Attribute\Input\CanBeChecked;
    use Attribute\Input\CanBeRequired;
    use Attribute\Input\HasName;
    use Attribute\Input\HasValue;

    protected array $attributes = [];
    /**
     * @psalm-var Checkbox[]|Radio[] $items
     */
    protected array $items = [];
    protected string $separator = '';

    public function loadDefaultDefinitions(): array
    {
        return [
            'container()' => [true],
        ];
    }

    public function items(Checkbox|Radio ...$items): static
    {
        $new = clone $this;
        $new->items = $items;

        return $new;
    }

    protected function run(): string
    {
        $value = $this->getValue();

        $this->validateScalar($value);

        $attributes = $this->attributes;
        $containerAttributes = $this->containerAttributes;
        $id = $this->generateId('choice-');
        $items = $this->items;
        $labelTag = '';
        $listItems = [];

        if ($this->ariaDescribedBy === true) {
            $attributes['aria-describedby'] = "$id-help";
        }

        if (array_key_exists('autofocus', $attributes) && is_bool($attributes['autofocus'])) {
            $containerAttributes['autofocus'] = $attributes['autofocus'];

            unset($attributes['autofocus']);
        }

        if (array_key_exists('tabindex', $attributes) && is_int($attributes['tabindex'])) {
            $containerAttributes['tabindex'] = $attributes['tabindex'];

            unset($attributes['tabindex']);
        }

        unset($attributes['value']);

        foreach ($items as $item) {
            $listItems[] = $item
                ->attributes($attributes)
                ->checked($value === $item->getValue())
                ->id(null)
                ->separator($this->separator)
                ->labelFor(null);
        }

        $listTagItems = implode(PHP_EOL, $listItems);

        if ($this->labelContent !== '') {
            $labelTag = Label::widget()
                ->attributes($this->labelAttributes)
                ->content($this->labelContent)
                ->for($id)
                ->render() . PHP_EOL;
        }

        return match ($this->container) {
            true => $labelTag .
                Tag::widget()
                    ->attributes($containerAttributes)
                    ->content($listTagItems)
                    ->id($id)
                    ->tagName($this->containerTag)
                    ->render(),
            default => $listTagItems,
        };
    }
}
