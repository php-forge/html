<?php

declare(strict_types=1);

namespace PHPForge\Html\Base;

use PHPForge\Html\Attribute;
use PHPForge\Html\Div;
use PHPForge\Html\HtmlBuilder;
use PHPForge\Widget\Element;

abstract class AbstractButton extends Element
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
        $attributes['type'] ??= 'button';

        if (array_key_exists('type', $attributes) && $attributes['type'] === 'link') {
            unset($attributes['type']);
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
