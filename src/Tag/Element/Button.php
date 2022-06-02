<?php

declare(strict_types=1);

namespace Forge\Html\Tag\Element;

use Forge\Html\Attribute\Attributes;
use Forge\Html\Tag\Tag;

/**
 * The <button> HTML element is an interactive element activated by a user with a mouse, keyboard, finger, voice
 * command, or other assistive technology. Once activated, it then performs a programmable action, such as
 * submitting a form or opening a dialog.
 *
 * @link https://html.spec.whatwg.org/multipage/form-elements.html#the-button-element
 */
final class Button
{
    /**
     * The created <button> HTML element.
     *
     * @param array $attributes The tag attributes in terms of name-value pairs. These will be rendered as the
     * attributes of the resulting tag. The values will be HTML-encoded using {@see Attributes::encode()}.
     * See {@see Attributes::render()} for details on how attributes are being rendered.
     * @param string $content The content of the tag.
     *
     * @return string The generated <button> HTML element.
     *
     * @psalm-param array{
     *   disabled: bool,
     *   form: string,
     *   formaction: string,
     *   formenctype: string,
     *   formmethod: string,
     *   formnovalidate: bool,
     *   formtarget: string,
     *   name: string,
     *   type: string,
     *   value: string
     * }|array $attributes
     *
     * @link https://html.spec.whatwg.org/multipage/form-control-infrastructure.html#attr-fe-disabled
     * @link https://html.spec.whatwg.org/multipage/form-control-infrastructure.html#attr-fae-form
     * @link https://html.spec.whatwg.org/multipage/form-control-infrastructure.html#attr-fs-formaction
     * @link https://html.spec.whatwg.org/multipage/form-control-infrastructure.html#attr-fs-formenctype
     * @link https://html.spec.whatwg.org/multipage/form-control-infrastructure.html#attr-fs-formmethod
     * @link https://html.spec.whatwg.org/multipage/form-control-infrastructure.html#attr-fs-formnovalidate
     * @link https://html.spec.whatwg.org/multipage/form-control-infrastructure.html#attr-fs-formtarget
     * @link https://html.spec.whatwg.org/multipage/form-control-infrastructure.html#attr-fe-name
     * @link https://html.spec.whatwg.org/multipage/form-elements.html#attr-button-type
     * @link https://html.spec.whatwg.org/multipage/form-elements.html#attr-button-value
     */
    public function create(array $attributes = [], string $content = ''): string
    {
        if (!isset($attributes['type'])) {
            $attributes['type'] = 'button';
        }

        return (new Tag())->create('button', $content, $attributes);
    }
}
