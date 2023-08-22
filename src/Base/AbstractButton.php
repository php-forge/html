<?php

declare(strict_types=1);

namespace PHPForge\Html\Base;

use PHPForge\Html\Attribute;
use PHPForge\Html\Div;
use PHPForge\Html\HtmlBuilder;
use PHPForge\Widget\AbstractWidget;

/**
 * This is an abstract class that extends AbstractWidget and serves as a base for generating the `<button>` tag.
 * The `<button>` tag is used to create a clickable button on a web page, typically used to initiate an action or submit
 * a form.
 * Concrete classes should extend this class to implement specific variations of the `<button>` tag and their generation logic.
 */
abstract class AbstractButton extends AbstractWidget
{
    use Attribute\Aria\HasAriaControls;
    use Attribute\Aria\HasAriaDisabled;
    use Attribute\Aria\HasAriaExpanded;
    use Attribute\Aria\HasRole;
    use Attribute\Custom\HasAttributes;
    use Attribute\Custom\HasContainer;
    use Attribute\Custom\HasContent;
    use Attribute\Custom\HasTagName;
    use Attribute\HasClass;
    use Attribute\HasData;
    use Attribute\HasId;
    use Attribute\HasStyle;
    use Attribute\HasTabindex;
    use Attribute\HasTitle;
    use Attribute\Input\HasName;
    use Attribute\Input\HasType;

    protected array $attributes = [];
    private bool $container = false;
    private string $containerTag = 'div';

    protected function run(): string
    {
        $attributes = $this->attributes;

        if (array_key_exists('type', $attributes) && $attributes['type'] === 'link') {
            unset($attributes['type']);
        } else {
            $attributes['type'] = 'button';
        }

        $buttonHtml = $this->renderButton($attributes);

        return match ($this->container) {
            true => Div::widget()->attributes($this->containerAttributes)->content($buttonHtml)->render(),
            default => $buttonHtml,
        };
    }

    private function renderButton(array $attributes): string
    {
        $content = $this->content;
        $tagName = $this->tagName === '' ? 'button' : $this->tagName;

        if ($content !== '') {
            $content = PHP_EOL . $content . PHP_EOL;
        }

        return HtmlBuilder::create($tagName, $content, $attributes);
    }
}
