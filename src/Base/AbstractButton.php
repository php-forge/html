<?php

declare(strict_types=1);

namespace PHPForge\Html\Base;

use PHPForge\Html\Attribute;
use PHPForge\Html\Helper\CssClass;
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
    use Attribute\Custom\HasAttributes;
    use Attribute\Custom\HasContainer;
    use Attribute\Custom\HasContent;
    use Attribute\HasClass;
    use Attribute\HasData;
    use Attribute\HasId;
    use Attribute\HasStyle;
    use Attribute\HasTabindex;
    use Attribute\HasTitle;
    use Attribute\Input\CanBeDisabled;
    use Attribute\Input\HasType;
    use Attribute\Tag\HasHref;

    protected array $attributes = [];
    private bool $container = false;
    private string $containerTag = 'div';

    protected function run(): string
    {
        $attributes = $this->attributes;
        $type = 'button';

        if (isset($attributes['type']) && is_string($attributes['type'])) {
            $type = $attributes['type'];
        }

        $attributes['type'] = $type;

        $buttonHtml = match ($type) {
            'link' => $this->renderButtonLink($attributes),
            default => $this->renderButton($attributes),
        };

        return match ($this->container) {
            true => HtmlBuilder::create('div', $buttonHtml, $this->containerAttributes),
            default => $buttonHtml,
        };
    }

    private function renderButton(array $attributes): string
    {
        $content = $this->content;

        if ($content !== '') {
            $content = PHP_EOL . $content . PHP_EOL;
        }

        return HtmlBuilder::create('button', $content, $attributes);
    }

    private function renderButtonLink(array $attributes): string
    {
        unset($attributes['type']);

        $attributes['role'] = 'button';
        $content = $this->content;

        if (isset($attributes['disabled']) && is_bool($attributes['disabled']) && $attributes['disabled'] === true) {
            CssClass::add($attributes, 'disabled');
            $attributes['aria-disabled'] = 'true';

            unset($attributes['disabled']);
        }

        if ($content !== '') {
            $content = PHP_EOL . $content . PHP_EOL;
        }

        return HtmlBuilder::create('a', $content, $attributes);
    }
}
