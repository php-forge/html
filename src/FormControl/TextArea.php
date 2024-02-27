<?php

declare(strict_types=1);

namespace PHPForge\Html\FormControl;

use PHPForge\{
    Html\Attribute\CanBeAutofocus,
    Html\Attribute\Custom\HasContent,
    Html\Attribute\Field\HasGenerateField,
    Html\Attribute\HasTabindex,
    Html\Attribute\Input\CanBeDisabled,
    Html\Attribute\Input\CanBeReadonly,
    Html\Attribute\Input\CanBeRequired,
    Html\Attribute\Input\HasAutocomplete,
    Html\Attribute\Input\HasDirname,
    Html\Attribute\Input\HasForm,
    Html\Attribute\Input\HasMaxLength,
    Html\Attribute\Input\HasMinLength,
    Html\Attribute\Input\HasPlaceholder,
    Html\Attribute\Tag\HasCols,
    Html\Attribute\Tag\HasRows,
    Html\Attribute\Tag\HasWrap,
    Html\Base\AbstractElement,
    Html\FormControl\Input\Contract\ContentInterface,
    Html\Interop\InputInterface,
    Html\Interop\LengthInterface,
    Html\Interop\PlaceholderInterface,
    Html\Interop\RequiredInterface,
    Widget\ElementInterface
};

/**
 * The `<textarea>` HTML element represents a multi-line plain-text editing control, useful when you want to allow users
 * to enter a sizable amount of free-form text, for example, a comment on a review or feedback form.
 *
 * @link https://html.spec.whatwg.org/multipage/form-elements.html#the-textarea-element
 */
final class TextArea extends AbstractElement implements
    ContentInterface,
    ElementInterface,
    InputInterface,
    LengthInterface,
    PlaceholderInterface,
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
