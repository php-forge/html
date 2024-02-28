<?php

declare(strict_types=1);

namespace PHPForge\Html\FormControl\Input\Base;

use PHPForge\{
    Html\Attribute\Aria\HasAriaDescribedBy,
    Html\Attribute\Aria\HasAriaLabel,
    Html\Attribute\CanBeAutofocus,
    Html\Attribute\CanBeHidden,
    Html\Attribute\Custom\HasAttributes,
    Html\Attribute\Custom\HasContainerCollection,
    Html\Attribute\Custom\HasContent,
    Html\Attribute\Custom\HasEnclosedByLabel,
    Html\Attribute\Custom\HasLabelCollection,
    Html\Attribute\Custom\HasPrefixCollection,
    Html\Attribute\Custom\HasSeparator,
    Html\Attribute\Custom\HasSuffixCollection,
    Html\Attribute\Custom\HasTemplate,
    Html\Attribute\Custom\HasUncheckedCollection,
    Html\Attribute\Custom\HasValidateScalar,
    Html\Attribute\Field\HasGenerateField,
    Html\Attribute\HasClass,
    Html\Attribute\HasData,
    Html\Attribute\HasId,
    Html\Attribute\HasLang,
    Html\Attribute\HasStyle,
    Html\Attribute\HasTabindex,
    Html\Attribute\HasTitle,
    Html\Attribute\Input\CanBeChecked,
    Html\Attribute\Input\CanBeDisabled,
    Html\Attribute\Input\CanBeReadonly,
    Html\Attribute\Input\CanBeRequired,
    Html\Attribute\Input\HasForm,
    Html\Attribute\Input\HasName,
    Html\Attribute\Input\HasValue,
    Html\FormControl\Input\Contract\LabelInterface,
    Html\FormControl\Label,
    Html\Interop\AriaDescribedByInterface,
    Html\Interop\CheckedInterface,
    Html\Interop\InputInterface,
    Html\Interop\RequiredInterface,
    Html\Interop\RenderInterface,
    Html\Tag,
    Widget\Element
};

/**
 * Provides a foundation for creating HTML elements with various attributes and content.
 */
abstract class AbstractInputChoice extends Element implements
    AriaDescribedByInterface,
    CheckedInterface,
    InputInterface,
    LabelInterface,
    RenderInterface,
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
    use HasContainerCollection;
    use HasContent;
    use HasData;
    use HasEnclosedByLabel;
    use HasForm;
    use HasGenerateField;
    use HasId;
    use HasLabelCollection;
    use HasLang;
    use HasName;
    use HasPrefixCollection;
    use HasSeparator;
    use HasStyle;
    use HasSuffixCollection;
    use HasTabindex;
    use HasTemplate;
    use HasTitle;
    use HasUncheckedCollection;
    use HasValidateScalar;
    use HasValue;

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
