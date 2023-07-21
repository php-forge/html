<?php

declare(strict_types=1);

namespace PHPForge\Html;

/**
 * The `<body>` `HTML` element represents the content of an HTML document.
 * There can be only one `<body>` element in a document.
 *
 * @link https://html.spec.whatwg.org/multipage/sections.html#the-body-element
 */
final class Body extends Base\AbstractElement
{
    protected string $tagName = 'body';
}
