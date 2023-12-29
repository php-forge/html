<?php

declare(strict_types=1);

namespace PHPForge\Html\Input\Base;

use PHPForge\Html\Attribute;
use PHPForge\Html\Input\InputInterface;
use PHPForge\Html\Input\LabelInterface;
use PHPForge\Html\Label;
use PHPForge\Html\Tag;
use PHPForge\Widget\Element;

/**
 * Provides a foundation for creating HTML elements with various attributes and content.
 */
abstract class AbstractInputChoice extends Element implements LabelInterface, InputInterface
{
    use Attribute\Aria\HasAriaDescribedBy;
    use Attribute\Aria\HasAriaLabel;
    use Attribute\CanBeAutofocus;
    use Attribute\CanBeHidden;
    use Attribute\Custom\HasAttributes;
    use Attribute\Custom\HasCheckedValue;
    use Attribute\Custom\HasContainer;
    use Attribute\Custom\HasContent;
    use Attribute\Custom\HasEnclosedByLabel;
    use Attribute\Custom\HasLabel;
    use Attribute\Custom\HasPrefixAndSuffix;
    use Attribute\Custom\HasSeparator;
    use Attribute\Custom\HasTemplate;
    use Attribute\Custom\HasUnchecked;
    use Attribute\Custom\HasWidgetValidation;
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
    protected string $separator = PHP_EOL;
    protected string $tagName = '';
    protected string $template = '{prefix}\n{unchecktag}\n{tag}\n{label}\n{suffix}';

    /**
     * Generate the HTML representation of the element.
     *
     * @return string The HTML representation of the element.
     */
    protected function buildChoiceTag(string $type): string
    {
        $value = $this->getValue();

        $this->validateScalar($value, $this->checkedValue);

        $attributes = $this->attributes;
        $labelTag = '';

        /** @var string $id */
        $id = $attributes['id'] ?? $this->generateId("$type-");

        if ($this->ariaDescribedBy === true) {
            $attributes['aria-describedby'] = "$id-help";
        }

        $value = is_bool($value) ? (int) $value : $value;
        $checkedValue = is_bool($this->checkedValue) ? (int) $this->checkedValue : $this->checkedValue;

        $attributes['checked'] = match (empty($checkedValue)) {
            true => $this->checked,
            default => $value === $checkedValue,
        };

        unset($attributes['id'], $attributes['type'], $attributes['value']);

        $tag = Tag::widget()->attributes($attributes)->id($id)->tagName('input')->type($type)->value($value)->render();

        if ($this->enclosedByLabel) {
            $tag = $this->renderEnclosedByLabel($tag);
        } else {
            $labelTag = $this->renderLabelTag($this->getId() ?? '');
        }

        $choiceTag = $this->prepareTemplate($tag, $labelTag);

        return $this->renderContainerTag($choiceTag);
    }

    private function prepareTemplate(string $tag, string $labelTag): string
    {
        $tokenValues = [
            '{prefix}' => $this->renderPrefixTag(),
            '{unchecktag}' => $this->renderUncheckTag(),
            '{tag}' => $tag,
            '{label}' => $labelTag,
            '{suffix}' => $this->renderSuffixTag(),
        ];

        return $this->renderTemplate($this->template, $tokenValues);
    }

    private function renderEnclosedByLabel(string $tag): string
    {
        if ($this->labelContent === '' || $this->isNotLabel()) {
            return $tag;
        }

        return Label::widget()
            ->attributes($this->labelAttributes)
            ->content(
                $this->separator,
                $tag,
                $this->separator,
                $this->labelContent,
                $this->separator,
            )
            ->for($this->getId())
            ->render();
    }
}
