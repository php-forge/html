<?php

declare(strict_types=1);

namespace PHPForge\Html\Base;

use PHPForge\Html\Attribute;
use PHPForge\Html\HtmlBuilder;
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
    protected string $template = '{prefix}{input}{suffix}';

    protected function run(): string
    {
        $attributes = $this->attributes;
        $prefix = $this->prefix;
        $suffix = $this->suffix;
        $type = $attributes['type'] ?? 'text';

        if ($prefix !== '' && $type !== 'checkbox' && $type !== 'radio') {
            $prefix .= PHP_EOL;
        }

        if (array_key_exists('value', $attributes) && $attributes['value'] === '') {
            unset($attributes['value']);
        }

        if ($suffix !== '' && $type !== 'checkbox' && $type !== 'radio') {
            $suffix = PHP_EOL . $suffix;
        }

        return strtr(
            $this->template,
            [
                '{prefix}' => $prefix,
                '{input}' => HtmlBuilder::create('input', '', $attributes),
                '{suffix}' => $suffix,
            ],
        );
    }
}
