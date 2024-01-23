<?php

declare(strict_types=1);

namespace PHPForge\Html;

use PHPForge\Html\Input\Contract;

/**
 * The `<textarea>` HTML element represents a multi-line plain-text editing control, useful when you want to allow users
 * to enter a sizable amount of free-form text, for example, a comment on a review or feedback form.
 *
 * @link https://html.spec.whatwg.org/multipage/form-elements.html#the-textarea-element
 */
final class TextArea extends Base\AbstractElement implements
    Contract\ContentInterface,
    Contract\InputInterface,
    Contract\LengthInterface,
    Contract\PlaceholderInterface,
    Contract\RequiredInterface
{
    use Attribute\CanBeAutofocus;
    use Attribute\Input\CanBeDisabled;
    use Attribute\Input\CanBeReadonly;
    use Attribute\Input\CanBeRequired;
    use Attribute\Input\HasAutocomplete;
    use Attribute\Input\HasDirname;
    use Attribute\Input\HasForm;
    use Attribute\Input\HasMaxLength;
    use Attribute\Input\HasMinLength;
    use Attribute\Input\HasPlaceholder;
    use Attribute\Tag\HasCols;
    use Attribute\Tag\HasRows;
    use Attribute\Tag\HasWrap;

    protected string $tagName = 'textarea';

    /**
     * This method is used to configure the widget with the provided default definitions.
     */
    protected function loadDefaultDefinitions(): array
    {
        $loadDefaultDefinitions = parent::loadDefaultDefinitions();
        $loadDefaultDefinitions += [
            'id()' => [$this->generateId('textarea-')],
        ];

        return $loadDefaultDefinitions;
    }
}
