<?php

declare(strict_types=1);

namespace PHPForge\Html\Input\Base;

use InvalidArgumentException;
use PHPForge\Html\Attribute;
use PHPForge\Html\Input\CheckedValueInterface;
use PHPForge\Html\Input\Hidden;
use PHPForge\Html\Input\LabelInterface;
use PHPForge\Html\Label;
use PHPForge\Html\Tag;

use function is_bool;
use function is_iterable;
use function is_object;

abstract class AbstractChoice extends AbstractInput implements CheckedValueInterface, LabelInterface
{
    use Attribute\Custom\HasCheckedValue;
    use Attribute\Custom\HasContainer;
    use Attribute\Custom\HasLabel;
    use Attribute\Custom\HasSeparator;
    use Attribute\Custom\HasUnchecked;
    use Attribute\Input\CanBeChecked;
    use Attribute\Input\CanBeRequired;

    protected array $attributes = [];
    protected bool $container = false;
    protected string $containerTag = 'div';
    protected string $type = '';
    protected string $separator = PHP_EOL;

    protected function run(): string
    {
        $value = $this->getValue();

        /**
         * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.checkbox.html#input.checkbox.attrs.value
         */
        if (is_iterable($value) || is_object($value)) {
            throw new InvalidArgumentException(
                sprintf('%s::class widget value can not be an iterable or an object.', static::class)
            );
        }

        $attributes = $this->attributes;
        $attributes['value'] = is_bool($value) ? (int) $value : $value;
        $checkedValue = is_bool($this->checkedValue) ? (int) $this->checkedValue : $this->checkedValue;

        $attributes['checked'] = match (empty($checkedValue)) {
            true => $this->checked,
            default => $attributes['value'] === $checkedValue,
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
            ->content(
                $this->separator,
                $inputCheckboxTag,
                $this->separator,
                $this->labelContent,
                $this->separator,
            )
            ->for($inputCheckboxTag->getId());
    }
}
