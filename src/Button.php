<?php

declare(strict_types=1);

namespace PHPForge\Html;

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
    use Attribute\Aria\HasAriaControls;
    use Attribute\Aria\HasAriaDescribedBy;
    use Attribute\Aria\HasAriaDisabled;
    use Attribute\Aria\HasAriaExpanded;
    use Attribute\Aria\HasAriaLabel;
    use Attribute\Aria\HasRole;
    use Attribute\Custom\HasAttributes;
    use Attribute\Custom\HasContainer;
    use Attribute\Custom\HasContent;
    use Attribute\Custom\HasPrefixAndSuffix;
    use Attribute\Custom\HasTagName;
    use Attribute\Custom\HasTemplate;
    use Attribute\Custom\HasWidgetValidation;
    use Attribute\HasClass;
    use Attribute\HasData;
    use Attribute\HasId;
    use Attribute\HasLang;
    use Attribute\HasStyle;
    use Attribute\HasTabindex;
    use Attribute\HasTitle;
    use Attribute\Input\HasName;
    use Attribute\Input\HasType;

    protected array $attributes = [];
    protected string $tagName = 'button';

    /**
     * Set the button type to `submit`.
     *
     * @return self A new instance of the current class with the specified type value.
     */
    public function submit(): self
    {
        return $this->type('submit');
    }

    /**
     * Set the button type to `reset`.
     *
     * @return self A new instance of the current class with the specified type value.
     */
    public function reset(): self
    {
        return $this->type('reset');
    }

    /**
     * This method is used to configure the widget with the provided default definitions.
     */
    protected function loadDefaultDefinitions(): array
    {
        return [
            'id()' => [$this->generateId('button-')],
            'template()' => ['{prefix}\n{tag}\n{suffix}'],
            'type()' => ['button'],
        ];
    }

    /**
     * Generate the HTML representation of the element.
     *
     * @return string The HTML representation of the element.
     */
    protected function run(): string
    {
        $this->validateTagName($this->tagName, 'a', 'button');

        $attributes = $this->attributes;

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
