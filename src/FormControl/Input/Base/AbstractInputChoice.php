<?php

declare(strict_types=1);

namespace PHPForge\Html\FormControl\Input\Base;

use PHPForge\Html\{
    Attribute\Aria\HasAriaDescribedBy,
    Attribute\Aria\HasAriaLabel,
    Attribute\CanBeAutofocus,
    Attribute\CanBeHidden,
    Attribute\Custom\HasAttributes,
    Attribute\Custom\HasContainer,
    Attribute\Custom\HasContent,
    Attribute\Custom\HasEnclosedByLabel,
    Attribute\Custom\HasLabelCollection,
    Attribute\Custom\HasPrefixAndSuffixCollection,
    Attribute\Custom\HasSeparator,
    Attribute\Custom\HasTemplate,
    Attribute\Custom\HasUnchecked,
    Attribute\Custom\HasWidgetValidation,
    Attribute\Field\HasGenerateField,
    Attribute\HasClass,
    Attribute\HasData,
    Attribute\HasId,
    Attribute\HasLang,
    Attribute\HasStyle,
    Attribute\HasTabindex,
    Attribute\HasTitle,
    Attribute\Input\CanBeChecked,
    Attribute\Input\CanBeDisabled,
    Attribute\Input\CanBeReadonly,
    Attribute\Input\CanBeRequired,
    Attribute\Input\HasForm,
    Attribute\Input\HasName,
    Attribute\Input\HasValue,
    FormControl\Input\Contract\AriaDescribedByInterface,
    FormControl\Input\Contract\CheckedInterface,
    FormControl\Input\Contract\InputInterface,
    FormControl\Input\Contract\LabelInterface,
    FormControl\Input\Contract\RequiredInterface,
    FormControl\Label,
    Tag
};
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
    use HasLabelCollection;
    use HasLang;
    use HasName;
    use HasPrefixAndSuffixCollection;
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
        if ($this->isLabel === false || $this->label === '') {
            return $tag;
        }

        return Label::widget()
            ->attributes($this->labelAttributes)
            ->content(
                $this->separator,
                $tag,
                $this->separator,
                $this->label,
                $this->separator,
            )
            ->for($labelFor)
            ->render();
    }
}
