<?php

declare(strict_types=1);

namespace PHPForge\Html\FormControl;

use PHPForge\Html\{
    Attribute\CanBeAutofocus,
    Attribute\Custom\HasContent,
    Attribute\Field\HasGenerateField,
    Attribute\HasTabindex,
    Attribute\Input\CanBeDisabled,
    Attribute\Input\CanBeReadonly,
    Attribute\Input\CanBeRequired,
    Attribute\Input\HasAutocomplete,
    Attribute\Input\HasDirname,
    Attribute\Input\HasForm,
    Attribute\Input\HasMaxLength,
    Attribute\Input\HasMinLength,
    Attribute\Input\HasPlaceholder,
    Attribute\Tag\HasCols,
    Attribute\Tag\HasRows,
    Attribute\Tag\HasWrap,
    Base\AbstractElement,
    FormControl\Input\Contract\ContentInterface,
    Interop\InputInterface,
    Interop\LengthInterface,
    Interop\PlaceholderInterface,
    Interop\RenderInterface,
    Interop\RequiredInterface
};

/**
 * The `<textarea>` HTML element represents a multi-line plain-text editing control, useful when you want to allow users
 * to enter a sizable amount of free-form text, for example, a comment on a review or feedback form.
 *
 * @link https://html.spec.whatwg.org/multipage/form-elements.html#the-textarea-element
 */
final class TextArea extends AbstractElement implements
    ContentInterface,
    InputInterface,
    LengthInterface,
    PlaceholderInterface,
    RenderInterface,
    RequiredInterface
{
    use CanBeAutofocus;
    use CanBeDisabled;
    use CanBeReadonly;
    use CanBeRequired;
    use HasAutocomplete;
    use HasCols;
    use HasContent;
    use HasDirname;
    use HasForm;
    use HasGenerateField;
    use HasMaxLength;
    use HasMinLength;
    use HasPlaceholder;
    use HasRows;
    use HasTabindex;
    use HasWrap;

    /**
     * This method is used to configure the widget with the provided default definitions.
     */
    protected function loadDefaultDefinitions(): array
    {
        return [
            'id()' => [$this->generateId('textarea-')],
            'template()' => ['{prefix}\n{tag}\n{suffix}'],
        ];
    }

    protected function run(): string
    {
        return $this->buildElement('textarea', $this->content);
    }
}
