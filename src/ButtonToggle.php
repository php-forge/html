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
    use Attribute\Custom\HasTemplate;
    use Attribute\HasClass;
    use Attribute\HasData;
    use Attribute\HasId;
    use Attribute\HasStyle;
    use Attribute\Input\HasName;

    protected array $attributes = [];
    protected bool $icon = true;
    protected string $iconTag = 'svg';
    protected bool $iconContainer = false;
    protected string $tagName = 'button';
    protected string $template = '{toggle}\n{icon}\n{content}';
    protected bool $toggle = true;
    protected string $toggleTag = 'span';

    /**
     * Set tag name to `a` for the toggle.
     *
     * @return static A new instance of the current class with the specified tag name.
     */
    public function link(): static
    {
        $new = clone $this;
        $new->tagName = 'a';
        return $new;
    }

    /**
     * Generate the HTML representation of the element.
     *
     * @return string The HTML representation of the element.
     */
    protected function run(): string
    {
        $attributes = $this->attributes;

        $id = $this->generateId('button-toggle-');

        if ($this->ariaControls) {
            $attributes['aria-controls'] = $id;
        }

        if ($this->dataBsTarget) {
            $attributes['data-bs-target'] = "#$id";
        }

        if ($this->dataDismissTarget === true) {
            $attributes['data-dismiss-target'] = $id;
        }

        if ($this->dataDrawerTarget === true) {
            $attributes['data-drawer-target'] = $id;
        }

        if ($this->dataDropdownToggle === true) {
            $attributes['data-dropdown-toggle'] = $id;
        }

        if ($this->dataToggle === true) {
            $attributes['data-toggle'] = $id;
        }

        $result = '';
        $tokenValues = [
            '{toggle}' => $this->renderToggleTag(),
            '{icon}' => $this->renderIconTag(),
            '{content}' => $this->content,
        ];
        $tokenValues += $this->tokenValue;

        $tokens = explode('\n', $this->template);

        foreach ($tokens as $token) {
            $tokenValue = strtr($token, $tokenValues);

            if ($tokenValue !== '') {
                $result .= $tokenValue . "\n";
            }
        }

        $content = $result !== '' ? PHP_EOL . $result : '';

        return Button::widget()
            ->ariaDescribedBy($this->ariaDescribedBy)
            ->attributes($attributes)
            ->content($content)
            ->id($id)
            ->role($this->role)
            ->tagName($this->tagName)
            ->render();
    }
}
