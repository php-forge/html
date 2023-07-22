<?php

declare(strict_types=1);

namespace PHPForge\Html;

/**
 * Represents a tag component.
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
final class Tag extends Base\AbstractTag
{
}
