<?php

declare(strict_types=1);

namespace PHPForge\Html;

/**
 * The `<head>` `HTML` element contains machine-readable information (metadata) about the document, like its title,
 * scripts, and style sheets.
 *
 * @link https://html.spec.whatwg.org/multipage/semantics.html#the-head-element
 */
final class Head extends Base\AbstractBlockElement
{
    protected string $tagName = 'head';
}
