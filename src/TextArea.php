<?php

declare(strict_types=1);

namespace PHPForge\Html;

/**
 * The `<textarea>` HTML element represents a multi-line plain-text editing control, useful when you want to allow users
 * to enter a sizeable amount of free-form text, for example a comment on a review or feedback form.
 *
 * @link https://html.spec.whatwg.org/multipage/form-elements.html#the-textarea-element
 */
final class TextArea extends Base\AbstractElement
{
    use Attribute\Input\HasAutocomplete;
    use Attribute\Input\HasDirname;
    use Attribute\Input\HasMaxLength;
    use Attribute\Input\HasMinLength;
    use Attribute\Input\HasPlaceholder;
    use Attribute\Tag\HasCols;
    use Attribute\Tag\HasRows;
    use Attribute\Tag\HasWrap;

    protected string $tagName = 'textarea';
}
