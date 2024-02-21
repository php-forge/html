<?php

declare(strict_types=1);

namespace PHPForge\Html\Group;

use PHPForge\Html\Base\AbstractBlockElement;

/**
 * The `<main>` HTML element represents the dominant content of the <body> of a document. The main content area consists
 * of content that is directly related to or expands upon the central topic of a document, or the central functionality
 * of an application.
 *
 * @link https://html.spec.whatwg.org/multipage/grouping-content.html#the-main-element
 */
final class Main extends AbstractBlockElement
{
    protected string $tagName = 'main';
}
