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
    Html\Attribute\Custom\HasPrefixCollection,
    Html\Attribute\Custom\HasSeparator,
    Html\Attribute\Custom\HasSuffixCollection,
    Html\Attribute\Custom\HasTemplate,
    Html\Attribute\Custom\HasUncheckedCollection,
    Html\Attribute\FormControl\CanBeDisabled,
    Html\Attribute\FormControl\CanBeReadonly,
    Html\Attribute\FormControl\CanBeRequired,
    Html\Attribute\FormControl\HasFieldAttributes,
    Html\Attribute\FormControl\HasForm,
    Html\Attribute\FormControl\HasName,
    Html\Attribute\FormControl\Input\CanBeChecked,
    Html\Attribute\FormControl\Label\CanBeDisableLabel,
    Html\Attribute\FormControl\Label\HasLabel,
    Html\Attribute\FormControl\Label\HasLabelAttributes,
    Html\Attribute\FormControl\Label\HasLabelClass,
    Html\Attribute\FormControl\Label\HasLabelFor,
    Html\Attribute\HasClass,
    Html\Attribute\HasData,
    Html\Attribute\HasId,
    Html\Attribute\HasLang,
    Html\Attribute\HasStyle,
    Html\Attribute\HasTabindex,
    Html\Attribute\HasTitle,
    Html\Attribute\Input\HasValue,
    Html\FormControl\Label,
    Html\Helper\Utils,
    Html\Helper\Validator,
    Html\Interop\AriaDescribedByInterface,
    Html\Interop\CheckedInterface,
    Html\Interop\InputInterface,
    Html\Interop\LabelInterface,
    Html\Interop\RenderInterface,
    Html\Interop\RequiredInterface,
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
    use CanBeDisableLabel;
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
    use HasFieldAttributes;
    use HasForm;
    use HasId;
    use HasLabel;
    use HasLabelAttributes;
    use HasLabelClass;
    use HasLabelFor;
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
    use HasValue;

    protected array $attributes = [];
    protected string $tagName = '';

    /**
     * This method is used to configure the widget with the provided default definitions.
     */
    protected function loadDefaultDefinitions(): array
    {
        $class = Utils::getShortNameClass(static::class, false, true);

        return [
            'id()' => [Utils::generateId("$class-")],
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

        Validator::isScalar($value, $this->checked);

        $attributes = $this->attributes;

        $id = $this->getId();

        if ($this->ariaDescribedBy === true && $id !== null) {
            $attributes['aria-describedby'] = "$id-help";
        }

        $value = is_bool($value) ? (int) $value : $value;

        if ($this->checked === true && $value === null) {
            $attributes['checked'] = true;
        }

        if (is_scalar($this->checked) && $value !== null) {
            $attributes['checked'] = "$value" === "$this->checked";
        }

        unset($attributes['type'], $attributes['value']);

        $tag = Tag::widget()->attributes($attributes)->tagName('input')->type($type)->value($value)->render();
        $labelTag = '';

        if ($this->enclosedByLabel === true && $this->disableLabel === false && $this->label !== '') {
            $tag = $this->renderLabel(
                $this->separator,
                $tag,
                $this->separator,
                $this->label,
                $this->separator,
            );
        } elseif ($this->disableLabel === false) {
            $labelTag = $this->renderLabel($this->label);
        }

        $choiceTag = $this->prepareTemplate($tag, $labelTag);

        return $this->renderContainerTag(null, $choiceTag);
    }

    private function prepareTemplate(string $tag, string $labelTag): string
    {
        $tokenValues = [
            '{prefix}' => $this->renderPrefixTag(),
            '{unchecktag}' => $this->renderUncheckTag($this->getName()),
            '{tag}' => $tag,
            '{label}' => $labelTag,
            '{suffix}' => $this->renderSuffixTag(),
        ];

        return $this->renderTemplate($this->template, $tokenValues);
    }

    private function renderLabel(string ...$content): string
    {
        return Label::widget()
            ->attributes($this->labelAttributes)
            ->content(...$content)
            ->for($this->labelFor ?? $this->getId())
            ->render();
    }
}
