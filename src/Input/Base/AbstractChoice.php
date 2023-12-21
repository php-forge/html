<?php

declare(strict_types=1);

namespace PHPForge\Html\Input\Base;

use InvalidArgumentException;
use PHPForge\Html\Attribute;
use PHPForge\Html\Input\Hidden;
use PHPForge\Html\Input\InputInterface;
use PHPForge\Html\Input\LabelInterface;
use PHPForge\Html\Label;
use PHPForge\Html\Tag;
use PHPForge\Widget\Element;

use function is_bool;
use function is_iterable;
use function is_object;

abstract class AbstractChoice extends AbstractInput implements LabelInterface
{
    use Attribute\Custom\HasCheckedValue;
    use Attribute\Custom\HasContainer;
    use Attribute\Custom\HasLabel;
    use Attribute\Custom\HasUnchecked;
    use Attribute\Input\CanBeChecked;
    use Attribute\Input\CanBeRequired;

    protected array $attributes = [];
    protected bool $container = false;
    protected string $containerTag = 'div';
    protected string $type = '';

    protected function run(): string
    {
        $attributes = $this->attributes;
        $value = $attributes['value'] ?? null;

        /**
         * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.checkbox.html#input.checkbox.attrs.value
         */
        if (is_iterable($value) || is_object($value)) {
            throw new InvalidArgumentException(
                sprintf('%s::class widget value can not be an iterable or an object.', static::class)
            );
        }

        $attributes['value'] = is_bool($value) ? (int) $value : $value;

        $attributes['checked'] = match (empty($this->checkedValue)) {
            true => $this->checked,
            default => $attributes['value'] === $this->checkedValue,
        };

        $inputCheckboxTag = $this->buildInputTag($attributes, $this->type, $this->generateUncheckTag());

        if ($this->isNotLabel() === false) {
            $inputCheckboxTag = $this->renderLabelTag($inputCheckboxTag);
        }

        return $this->renderContainerTag($inputCheckboxTag);
    }

    private function generateUncheckTag(): string
    {
        if ($this->uncheckValue === null) {
            return '';
        }

        return Hidden::widget()
            ->attributes($this->uncheckAttributes)
            ->id(null)
            ->value($this->uncheckValue)
            ->render();
    }

    private function renderContainerTag(Label|Tag $inputCheckboxTag): string
    {
        return match ($this->container) {
            true => Tag::widget()
                ->attributes($this->containerAttributes)
                ->content($inputCheckboxTag)
                ->tagName($this->containerTag)
                ->render(),
            default => $inputCheckboxTag->render(),
        };
    }

    private function renderLabelTag(Tag $inputCheckboxTag): Label|Tag
    {
        if ($this->labelContent === '') {
            return $inputCheckboxTag;
        }

        return Label::widget()
            ->attributes($this->labelAttributes)
            ->content(PHP_EOL, $inputCheckboxTag, PHP_EOL, $this->labelContent, PHP_EOL)
            ->for($inputCheckboxTag->getId());
    }
}
