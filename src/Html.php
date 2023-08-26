<?php

declare(strict_types=1);

namespace PHPForge\Html;

/**
 * The `<html>` HTML element represents the root (top-level element) of an HTML document, so it is also referred to as
 * the root element. All other elements must be descendants of this element.
 *
 * @link https://html.spec.whatwg.org/multipage/semantics.html#the-html-element
 */
final class Html extends Base\AbstractBlockElement
{
    protected string $tagName = 'html';
}
