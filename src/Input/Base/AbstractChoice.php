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

abstract class AbstractChoice extends Element implements InputInterface, LabelInterface
{
    use Attribute\Aria\HasAriaDescribedBy;
    use Attribute\Aria\HasAriaLabel;
    use Attribute\CanBeAutofocus;
    use Attribute\CanBeHidden;
    use Attribute\Custom\HasAttributes;
    use Attribute\Custom\HasCheckedValue;
    use Attribute\Custom\HasContainer;
    use Attribute\Custom\HasLabel;
    use Attribute\Custom\HasPrefixAndSuffix;
    use Attribute\Custom\HasTemplate;
    use Attribute\Custom\HasUnchecked;
    use Attribute\HasClass;
    use Attribute\HasData;
    use Attribute\HasId;
    use Attribute\HasLang;
    use Attribute\HasStyle;
    use Attribute\HasTabindex;
    use Attribute\HasTitle;
    use Attribute\Input\CanBeChecked;
    use Attribute\Input\CanBeDisabled;
    use Attribute\Input\CanBeReadonly;
    use Attribute\Input\CanBeRequired;
    use Attribute\Input\HasForm;
    use Attribute\Input\HasName;
    use Attribute\Input\HasValue;

    protected array $attributes = [];
    protected bool $container = false;
    protected string $containerTag = 'div';
    protected string $template = '{prefix}{tag}{suffix}';
    protected string $type = '';

    protected function run(): string
    {
        $attributes = $this->attributes;
        $uncheckTag = '';
        $value = $attributes['value'] ?? null;

        /**
         * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.checkbox.html#input.checkbox.attrs.value
         */
        if (is_iterable($value) || is_object($value)) {
            throw new InvalidArgumentException(
                sprintf('%s::class widget value can not be an iterable or an object.', static::class)
            );
        }

        $value = is_bool($value) ? (int) $value : $value;

        unset($attributes['value']);

        if ($this->uncheckValue !== null) {
            $uncheckTag = Hidden::widget()
                ->attributes($this->uncheckAttributes)
                ->id(null)
                ->value($this->uncheckValue)
                ->render();
        }

        $attributes['checked'] = match (empty($this->checkedValue)) {
            true => $this->checked,
            default => $value === $this->checkedValue,
        };

        $inputCheckboxTag = $this->renderInputCheckboxTag($attributes, $uncheckTag, $value);

        if ($this->isNotLabel() === false) {
            $inputCheckboxTag = $this->renderLabelTag($inputCheckboxTag);
        }

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

    private function renderInputCheckboxTag(array $attributes, string $uncheckTag, mixed $value): Tag
    {
        return Tag::widget()
            ->attributes($attributes)
            ->id($this->generateId("$this->type-"))
            ->prefix($this->prefix, $uncheckTag)
            ->prefixContainer($this->prefixContainer)
            ->prefixContainerAttributes($this->prefixContainerAttributes)
            ->prefixContainerTag($this->prefixContainerTag)
            ->suffix($this->suffix)
            ->suffixContainer($this->suffixContainer)
            ->suffixContainerAttributes($this->suffixContainerAttributes)
            ->suffixContainerTag($this->suffixContainerTag)
            ->tagName('input')
            ->template($this->template)
            ->type($this->type)
            ->value($value);
    }
}
