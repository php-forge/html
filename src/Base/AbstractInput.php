<?php

declare(strict_types=1);

namespace PHPForge\Html\Base;

use PHPForge\Html\Attribute;
use PHPForge\Html\Tag;
use PHPForge\Widget\Element;

/**
 * Provides a foundation for creating HTML `input` custom elements with various attributes and content.
 */
abstract class AbstractInput extends Element
{
    use Attribute\Aria\HasAriaDescribedBy;
    use Attribute\Aria\HasAriaLabel;
    use Attribute\CanBeAutofocus;
    use Attribute\CanBeHidden;
    use Attribute\Custom\HasAttributes;
    use Attribute\Custom\HasPrefixAndSuffix;
    use Attribute\Custom\HasTemplate;
    use Attribute\HasClass;
    use Attribute\HasId;
    use Attribute\HasLang;
    use Attribute\HasStyle;
    use Attribute\HasTabindex;
    use Attribute\HasTitle;
    use Attribute\Input\HasName;
    use Attribute\Input\HasType;

    protected array $attributes = [];
    protected string $template = '{prefix}{tag}{suffix}';

    protected function run(): string
    {
        $attributes = $this->attributes;

        if (array_key_exists('value', $attributes) && $attributes['value'] === '') {
            unset($attributes['value']);
        }

        return Tag::widget()
            ->attributes($attributes)
            ->prefix($this->prefix)
            ->suffix($this->suffix)
            ->tagName('input')
            ->template($this->template)
            ->render();
    }
}
