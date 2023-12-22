<?php

declare(strict_types=1);

namespace PHPForge\Html\Input\Base;

use InvalidArgumentException;
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
    use Attribute\HasClass;
    use Attribute\HasId;
    use Attribute\HasTabindex;
    use Attribute\Input\CanBeChecked;
    use Attribute\Input\CanBeRequired;
    use Attribute\Input\HasName;
    use Attribute\Input\HasValue;

    protected array $attributes = [];
    protected bool $container = true;
    protected string $containerTag = 'div';
    /**
     * @psalm-var Checkbox[]|Radio[] $items
     */
    protected array $items = [];
    protected string $separator = '';

    public function items(Checkbox|Radio ...$items): static
    {
        $new = clone $this;
        $new->items = $items;

        return $new;
    }

    protected function renderChoiceItems(string $type): string
    {
        $attributes = $this->attributes;
        $containerAttributes = $this->containerAttributes;
        $id = $this->generateId("$type-");
        $items = $this->items;
        $labelTag = '';
        $listItems = [];
        $value = $this->getValue();

        /**
         * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.checkbox.html#input.checkbox.attrs.value
         */
        if (is_iterable($value) || is_object($value)) {
            throw new InvalidArgumentException(
                sprintf('%s widget checked value can not be an iterable or an object.', static::class)
            );
        }

        unset($attributes['value']);

        if (array_key_exists('autofocus', $attributes) && is_bool($attributes['autofocus'])) {
            $containerAttributes['autofocus'] = $attributes['autofocus'];

            unset($attributes['autofocus']);
        }

        if (array_key_exists('tabindex', $attributes) && is_int($attributes['tabindex'])) {
            $containerAttributes['tabindex'] = $attributes['tabindex'];

            unset($attributes['tabindex']);
        }

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
