<?php

declare(strict_types=1);

namespace PHPForge\Html;

use PHPForge\Widget\Element;

/**
 * The `<button>` toggle is a custom tag representing a toggle button.
 *
 * @link https://html.spec.whatwg.org/multipage/form-elements.html#the-button-element
 */
final class ButtonToggle extends Element
{
    use Attribute\Aria\HasAriaControls;
    use Attribute\Aria\HasAriaDescribedBy;
    use Attribute\Aria\HasAriaExpanded;
    use Attribute\Aria\HasAriaLabel;
    use Attribute\Aria\HasRole;
    use Attribute\Component\HasIcon;
    use Attribute\Component\HasToggle;
    use Attribute\Custom\HasAttributes;
    use Attribute\Custom\HasContent;
    use Attribute\Custom\HasDataBsAutoClose;
    use Attribute\Custom\HasDataBsDismiss;
    use Attribute\Custom\HasDataBsTarget;
    use Attribute\Custom\HasDataBsToggle;
    use Attribute\Custom\HasDataCollapseToggle;
    use Attribute\Custom\HasDataDismissTarget;
    use Attribute\Custom\HasDataDrawerTarget;
    use Attribute\Custom\HasDataDropdownToggle;
    use Attribute\Custom\HasDataToggle;
    use Attribute\Custom\HasDataValue;
    use Attribute\Custom\HasTemplate;
    use Attribute\HasClass;
    use Attribute\HasData;
    use Attribute\HasId;
    use Attribute\HasStyle;
    use Attribute\HasTabindex;
    use Attribute\HasTitle;
    use Attribute\Input\HasName;

    protected array $attributes = [];
    protected string $tagName = 'button';

    /**
     * Set tag name to `a` for the toggle.
     *
     * @return self A new instance of the current class with the specified tag name.
     */
    public function link(): self
    {
        $new = clone $this;
        $new->tagName = 'a';
        return $new;
    }

    /**
     * This method is used to configure the widget with the provided default definitions.
     */
    protected function loadDefaultDefinitions(): array
    {
        return [
            'id()' => [$this->generateId('button-toggle-')],
            'template()' => ['{toggle}\n{icon}\n{content}'],
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

        if ($this->ariaControls === true) {
            $attributes['aria-controls'] = $this->dataValue;
        }

        if ($this->dataBsTarget === true) {
            $attributes['data-bs-target'] = "#$this->dataValue";
        }

        if ($this->dataDismissTarget === true) {
            $attributes['data-dismiss-target'] = $this->dataValue;
        }

        if ($this->dataDrawerTarget === true) {
            $attributes['data-drawer-target'] = $this->dataValue;
        }

        if ($this->dataDropdownToggle === true) {
            $attributes['data-dropdown-toggle'] = $this->dataValue;
        }

        if ($this->dataToggle === true) {
            $attributes['data-toggle'] = $this->dataValue;
        }

        $tokenValues = [
            '{toggle}' => $this->renderToggleTag(),
            '{icon}' => $this->renderIconTag(),
            '{content}' => $this->content,
        ];

        $content = $this->renderTemplate($this->template, $tokenValues);
        $content = $content !== '' ? PHP_EOL . $content . PHP_EOL : '';

        return Button::widget()
            ->ariaDescribedBy($this->ariaDescribedBy)
            ->attributes($attributes)
            ->content($content)
            ->id($this->id)
            ->role($this->role)
            ->tagName($this->tagName)
            ->render();
    }
}
