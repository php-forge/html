<?php

declare(strict_types=1);

namespace PHPForge\Html\Semantic;

use PHPForge\Html\Base\AbstractBlockElement;

/**
 * Represents a footer for its nearest ancestor sectioning content or sectioning root element.
 * A footer typically contains information about the author of the section, copyright data or links to related documents.
 *
 * @link https://html.spec.whatwg.org/multipage/sections.html#the-footer-element
 */
final class Footer extends AbstractBlockElement
{
    protected string $tagName = 'footer';
}
