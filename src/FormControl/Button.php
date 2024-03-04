<?php

declare(strict_types=1);

namespace PHPForge\Html\FormControl;

use PHPForge\{
    Html\Attribute\Aria\HasAriaControls,
    Html\Attribute\Aria\HasAriaDescribedBy,
    Html\Attribute\Aria\HasAriaDisabled,
    Html\Attribute\Aria\HasAriaExpanded,
    Html\Attribute\Aria\HasAriaLabel,
    Html\Attribute\Aria\HasRole,
    Html\Attribute\Custom\HasContainerCollection,
    Html\Attribute\Custom\HasTagName,
    Html\Attribute\FormControl\HasFormaction,
    Html\Attribute\FormControl\HasFormenctype,
    Html\Attribute\FormControl\HasFormmethod,
    Html\Attribute\FormControl\HasFormnovalidate,
    Html\Attribute\FormControl\HasFormtarget,
    Html\Attribute\FormControl\HasName,
    Html\Attribute\Global\HasClass,
    Html\Attribute\Global\HasData,
    Html\Attribute\Global\HasId,
    Html\Attribute\Global\HasLang,
    Html\Attribute\Global\HasStyle,
    Html\Attribute\Global\HasTabindex,
    Html\Attribute\Global\HasTitle,
    Html\Attribute\HasAttributes,
    Html\Attribute\HasContent,
    Html\Attribute\HasPrefixCollection,
    Html\Attribute\HasSuffixCollection,
    Html\Attribute\HasTemplate,
    Html\Helper\Utils,
    Html\Helper\Validator,
    Html\Tag,
    Widget\Element
};

/**
 * The `<button>` `HTML` element is an interactive element activated by a user with a mouse, keyboard, finger, voice
 * command, or other assistive technology. Once activated, it then performs an action, such as submitting a form or
 * opening a dialog.
 *
 * @link https://html.spec.whatwg.org/multipage/form-elements.html#the-button-element
 */
final class Button extends Element
{
    use HasAriaControls;
    use HasAriaDescribedBy;
    use HasAriaDisabled;
    use HasAriaExpanded;
    use HasAriaLabel;
    use HasAttributes;
    use HasClass;
    use HasContainerCollection;
    use HasContent;
    use HasData;
    use HasFormaction;
    use HasFormenctype;
    use HasFormmethod;
    use HasFormnovalidate;
    use HasFormtarget;
    use HasId;
    use HasLang;
    use HasName;
    use HasPrefixCollection;
    use HasRole;
    use HasStyle;
    use HasSuffixCollection;
    use HasTabindex;
    use HasTagName;
    use HasTemplate;
    use HasTitle;

    protected string $type = 'button';

    /**
     * This method is used to configure the widget with the provided default definitions.
     */
    protected function loadDefaultDefinitions(): array
    {
        return [
            'id()' => [Utils::generateId('button-')],
            'prefixTag()' => [false],
            'suffixTag()' => [false],
            'template()' => ['{prefix}\n{tag}\n{suffix}'],
            'tagName()' => ['button'],
        ];
    }

    /**
     * Generate the HTML representation of the element.
     *
     * @return string The HTML representation of the element.
     */
    protected function run(): string
    {
        $attributes = $this->attributes;

        Validator::inList(
            $this->tagName,
            'Invalid value "%s" for the tagname method. Allowed values are: "%s".',
            'a',
            'button'
        );

        $id = $this->getId();

        if ($this->ariaDescribedBy === true && $id !== '') {
            $attributes['aria-describedby'] = "$id-help";
        }

        if ($this->tagName === 'a' && $this->role === true) {
            $attributes['role'] = 'role';
        }

        return $this->renderContainerTag(
            null,
            Tag::widget()
                ->attributes($attributes)
                ->content($this->content)
                ->prefix($this->prefix)
                ->prefixAttributes($this->prefixAttributes)
                ->prefixTag($this->prefixTag)
                ->suffix($this->suffix)
                ->suffixAttributes($this->suffixAttributes)
                ->suffixTag($this->suffixTag)
                ->tagName($this->tagName)
                ->template($this->template)
                ->type($this->type)
                ->render()
        );
    }
}
