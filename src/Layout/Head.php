<?php

declare(strict_types=1);

namespace PHPForge\Html\Layout;

use PHPForge\Html\Base\AbstractBlockElement;

/**
 * The `<head>` HTML element contains machine-readable information (metadata) about the document, like its title,
 * scripts, and style sheets.
 *
 * @link https://html.spec.whatwg.org/multipage/semantics.html#the-head-element
 */
final class Head extends AbstractBlockElement
{
    protected string $tagName = 'head';
}
