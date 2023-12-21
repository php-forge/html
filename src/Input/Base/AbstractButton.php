<?php

declare(strict_types=1);

namespace PHPForge\Html\Input\Base;

use InvalidArgumentException;
use PHPForge\Html\Attribute;
use PHPForge\Html\Input\Input;
use PHPForge\Html\Input\InputInterface;
use PHPForge\Html\Label;
use PHPForge\Html\Tag;
use PHPForge\Widget\Element;

use function array_key_exists;
use function is_string;

abstract class AbstractButton extends Element implements InputInterface
{
    use Attribute\CanBeHidden;
    use Attribute\Custom\HasAttributes;
    use Attribute\Custom\HasContainer;
    use Attribute\Custom\HasLabel;
    use Attribute\HasClass;
    use Attribute\HasId;
    use Attribute\HasStyle;
    use Attribute\HasTabindex;
    use Attribute\HasTitle;
    use Attribute\Input\CanBeDisabled;
    use Attribute\Input\HasForm;
    use Attribute\Input\HasName;
    use Attribute\Input\HasType;
    use Attribute\Input\HasValue;

    protected array $attributes = [];
    protected bool $container = true;
    protected string $containerTag = 'div';

    protected function run(): string
    {
        $buttonInput = Input::widget()->attributes($this->attributes)->id($this->id);
        $value = $this->attributes['value'] ?? null;

        /**
         * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.button.html#input.button.attrs.value
         */
        if ($value !== null && is_string($value) === false) {
            throw new InvalidArgumentException(
                sprintf('%s::class widget must be a string or null value.', static::class)
            );
        }

        if (array_key_exists('type', $this->attributes) === false) {
            $buttonInput = $buttonInput->type('button');
        }

        $buttonInput = $buttonInput->value($value);
        $labelFor = isset($this->labelAttributes['for']) && is_string($this->labelAttributes['for'])
            ? $this->labelAttributes['for'] : $this->id;

        $buttonTag = match ($this->labelContent !== '') {
            true => $buttonInput
                ->prefix(
                    Label::widget()
                        ->attributes($this->labelAttributes)
                        ->content($this->labelContent)
                        ->for($labelFor)
                        ->render(),
                )
                ->render(),
            default => $buttonInput->render(),
        };

        return match ($this->container) {
            true => Tag::widget()
                ->attributes($this->containerAttributes)
                ->content($buttonTag)
                ->tagName($this->containerTag)
                ->render(),
            default => $buttonTag,
        };
    }
}
