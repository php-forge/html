<?php

declare(strict_types=1);

namespace PHPForge\Html\Input\Base;

use InvalidArgumentException;
use PHPForge\Html\Attribute;
use PHPForge\Html\Label;
use PHPForge\Html\Tag;

use function array_key_exists;
use function is_string;

abstract class AbstractButton extends AbstractInput
{
    use Attribute\Custom\HasContainer;
    use Attribute\Custom\HasLabel;
    use Attribute\Input\HasType;

    protected array $attributes = [];
    protected bool $container = true;
    protected string $containerTag = 'div';

    protected function run(): string
    {
        $value = $this->getValue();

        /**
         * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.button.html#input.button.attrs.value
         */
        if ($value !== null && is_string($value) === false) {
            throw new InvalidArgumentException(
                sprintf('%s::class widget must be a string or null value.', static::class)
            );
        }

        $attributes = $this->attributes;
        $type = 'button';

        if (array_key_exists('type', $this->attributes)) {
            $type = (string) $this->attributes['type'];
        }

        $buttonInput = $this->buildInputTag($attributes, $type);
        $labelFor = $buttonInput->getId();

        if (array_key_exists('for', $this->labelAttributes)) {
            $labelFor = (string) $this->labelAttributes['for'];
        }

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
