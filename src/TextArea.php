<?php

declare(strict_types=1);

namespace PHPForge\Html;

/**
 * The `<textarea>` HTML element represents a multi-line plain-text editing control, useful when you want to allow users
 * to enter a sizeable amount of free-form text, for example a comment on a review or feedback form.
 *
 * @link https://html.spec.whatwg.org/multipage/form-elements.html#the-textarea-element
 */
final class TextArea extends Base\AbstractTextArea
{
    protected string $tagName = 'textarea';
}
