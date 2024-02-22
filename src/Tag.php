<?php

declare(strict_types=1);

namespace PHPForge\Html;

use PHPForge\Html\{
    Attribute\Custom\HasContent,
    Attribute\Custom\HasTagName,
    Attribute\Custom\HasTokenValues,
    Attribute\HasTabindex,
    Attribute\Input\HasType,
    Attribute\Input\HasValue,
    Base\AbstractElement
};

/**
 * The `<tag>` HTML element represents a generic tag.
 *
 * You must specify the tag name in the setter `tagName()`.
 *
 * ```php
 * <?= Tag::widget()->tagName('span')->run() ?>
 * ```
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Block-level_elements
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element
 */
final class Tag extends AbstractElement
{
    use HasContent;
    use HasTagName;
    use HasTokenValues;
    use HasTabindex;
    use HasType;
    use HasValue;

    protected function run(): string
    {
        return $this->buildElement($this->tagName, $this->content, $this->tokenValues);
    }
}
