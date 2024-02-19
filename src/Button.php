<?php

declare(strict_types=1);

namespace PHPForge\Html;

use PHPForge\Html\Attribute\Aria\{
    HasAriaControls,
    HasAriaDescribedBy,
    HasAriaDisabled,
    HasAriaExpanded,
    HasAriaLabel,
    HasRole
};
use PHPForge\Html\Attribute\Custom\{
    HasAttributes,
    HasContainer,
    HasContent,
    HasPrefixAndSuffix,
    HasTagName,
    HasTemplate,
    HasWidgetValidation
};
use PHPForge\Html\Attribute\Input\HasName;
use PHPForge\Html\Attribute\{HasClass, HasData, HasId, HasLang, HasStyle, HasTabindex, HasTitle};
use PHPForge\Widget\Element;

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
    use HasContainer;
    use HasContent;
    use HasData;
    use HasId;
    use HasLang;
    use HasName;
    use HasPrefixAndSuffix;
    use HasRole;
    use HasStyle;
    use HasTabindex;
    use HasTagName;
    use HasTemplate;
    use HasTitle;
    use HasWidgetValidation;

    protected array $attributes = [];
    protected string $type = 'button';

    /**
     * This method is used to configure the widget with the provided default definitions.
     */
    protected function loadDefaultDefinitions(): array
    {
        return [
            'id()' => [$this->generateId('button-')],
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

        $this->validateTagName($this->tagName, 'a', 'button');
        $this->validateType($this->type, 'button', 'reset', 'submit');

        if ($this->ariaDescribedBy === true) {
            $attributes['aria-describedby'] = "$this->id-help";
        }

        if ($this->tagName === 'a' && $this->role === true) {
            $attributes['role'] = 'role';
        }

        return $this->renderContainerTag(
            null,
            Tag::widget()
                ->attributes($attributes)
                ->content($this->content)
                ->id($this->id)
                ->prefix($this->prefix)
                ->prefixContainer($this->prefixContainer)
                ->prefixContainerAttributes($this->prefixContainerAttributes)
                ->prefixContainerTag($this->prefixContainerTag)
                ->suffix($this->suffix)
                ->suffixContainer($this->suffixContainer)
                ->suffixContainerAttributes($this->suffixContainerAttributes)
                ->suffixContainerTag($this->suffixContainerTag)
                ->tagName($this->tagName)
                ->template($this->template)
                ->type($this->type)
                ->render()
        );
    }
}
