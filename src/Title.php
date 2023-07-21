<?php

declare(strict_types=1);

namespace PHPForge\Html;

/**
 * The `<title>` `HTML` element defines the document's title that is shown in a browser's title bar or a page's tab.
 * It only contains text; tags within the element are ignored.
 *
 * @link https://html.spec.whatwg.org/multipage/semantics.html#the-title-element
 */
final class Title extends Base\AbstractElement
{
    protected string $tagName = 'title';
}
