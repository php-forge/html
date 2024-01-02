<?php

declare(strict_types=1);

namespace PHPForge\Html;

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
final class Tag extends Base\AbstractElement
{
    use Attribute\Custom\HasTagName;
    use Attribute\Input\HasValue;
}
