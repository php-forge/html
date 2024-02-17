<?php

declare(strict_types=1);

namespace PHPForge\Html\Input\Base;

use PHPForge\Html\Attribute\Aria\{HasAriaDescribedBy, HasAriaLabel};
use PHPForge\Html\Attribute\Custom\{
    HasAttributes,
    HasContainer,
    HasContent,
    HasEnclosedByLabel,
    HasLabel,
    HasPrefixAndSuffix,
    HasSeparator,
    HasTemplate,
    HasUnchecked,
    HasWidgetValidation
};
use PHPForge\Html\Attribute\Field\HasGenerateField;
use PHPForge\Html\Attribute\Input\{
    CanBeChecked,
    CanBeDisabled,
    CanBeReadonly,
    CanBeRequired,
    HasForm,
    HasName,
    HasValue
};
use PHPForge\Html\Attribute\{
    CanBeAutofocus,
    CanBeHidden,
    HasClass,
    HasData,
    HasId,
    HasLang,
    HasStyle,
    HasTabindex,
    HasTitle
};
use PHPForge\Html\Input\Contract\{
    AriaDescribedByInterface,
    CheckedInterface,
    InputInterface,
    LabelInterface,
    RequiredInterface
};
use PHPForge\Html\{Label, Tag};
use PHPForge\Widget\Element;

/**
 * Provides a foundation for creating HTML elements with various attributes and content.
 */
abstract class AbstractInputChoice extends Element implements
    AriaDescribedByInterface,
    CheckedInterface,
    InputInterface,
    LabelInterface,
    RequiredInterface
{
    use CanBeAutofocus;
    use CanBeChecked;
    use CanBeDisabled;
    use CanBeHidden;
    use CanBeReadonly;
    use CanBeRequired;
    use HasAriaDescribedBy;
    use HasAriaLabel;
    use HasAttributes;
    use HasClass;
    use HasContainer;
    use HasContent;
    use HasData;
    use HasEnclosedByLabel;
    use HasForm;
    use HasGenerateField;
    use HasId;
    use HasLabel;
    use HasLang;
    use HasName;
    use HasPrefixAndSuffix;
    use HasSeparator;
    use HasStyle;
    use HasTabindex;
    use HasTemplate;
    use HasTitle;
    use HasUnchecked;
    use HasValue;
    use HasWidgetValidation;

    protected array $attributes = [];
    protected string $tagName = '';

    /**
     * This method is used to configure the widget with the provided default definitions.
     */
    protected function loadDefaultDefinitions(): array
    {
        return [
            'separator()' => [PHP_EOL],
            'template()' => ['{prefix}\n{unchecktag}\n{tag}\n{label}\n{suffix}'],
        ];
    }

    /**
     * Generate the HTML representation of the element.
     *
     * @return string The HTML representation of the element.
     */
    protected function buildChoiceTag(string $type): string
    {
        $value = $this->getValue();

        $this->validateScalar($value, $this->checked);

        $attributes = $this->attributes;
        $labelTag = '';

        /** @var string $id */
        $id = $attributes['id'] ?? $this->generateId("$type-");

        if ($this->id === null) {
            $id = null;
        }

        $labelFor = $this->labelFor ?? $id;
        /** @var string $name */
        $name = $attributes['name'] ?? '';

        if ($this->ariaDescribedBy === true) {
            $attributes['aria-describedby'] = "$id-help";
        }

        $value = is_bool($value) ? (int) $value : $value;

        if ($this->checked === true && $value === null) {
            $attributes['checked'] = true;
        }

        if (is_scalar($this->checked) && $value !== null) {
            $attributes['checked'] = (string) $value === (string) $this->checked;
        }

        unset($attributes['id'], $attributes['type'], $attributes['value']);

        $tag = Tag::widget()->attributes($attributes)->id($id)->tagName('input')->type($type)->value($value)->render();

        if ($this->enclosedByLabel) {
            $tag = $this->renderEnclosedByLabel($tag, $labelFor);
        } else {
            $labelTag = $this->renderLabelTag($labelFor);
        }

        $choiceTag = $this->prepareTemplate($tag, $labelTag, $name);

        return $this->renderContainerTag(null, $choiceTag);
    }

    private function prepareTemplate(string $tag, string $labelTag, string $name): string
    {
        $tokenValues = [
            '{prefix}' => $this->renderPrefixTag(),
            '{unchecktag}' => $this->renderUncheckTag($name),
            '{tag}' => $tag,
            '{label}' => $labelTag,
            '{suffix}' => $this->renderSuffixTag(),
        ];

        return $this->renderTemplate($this->template, $tokenValues);
    }

    private function renderEnclosedByLabel(string $tag, string|null $labelFor): string
    {
        if ($this->labelContent === '' || $this->notLabel) {
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
            ->for($labelFor)
            ->render();
    }
}
