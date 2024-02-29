<?php

declare(strict_types=1);

namespace PHPForge\Html\FormControl;

use PHPForge\Html\{
    Attribute\CanBeAutofocus,
    Attribute\Custom\HasContent,
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
    Helper\Utils,
    Interop\ContentInterface,
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
    use HasMaxLength;
    use HasMinLength;
    use HasPlaceholder;
    use HasRows;
    use HasTabindex;
    use HasWrap;

    public function fieldAttributes(string $formModel, string $property, bool $arrayable = false): static
    {
        return $this
            ->id(Utils::generateInputId($formModel, $property))
            ->name(Utils::generateInputName($formModel, $property, $arrayable));
    }

    /**
     * This method is used to configure the widget with the provided default definitions.
     */
    protected function loadDefaultDefinitions(): array
    {
        return [
            'id()' => [Utils::generateId('textarea-')],
            'template()' => ['{prefix}\n{tag}\n{suffix}'],
        ];
    }

    protected function run(): string
    {
        return $this->buildElement('textarea', $this->content);
    }
}
