<?php

declare(strict_types=1);

namespace PHPForge\Html;

/**
 * The `<div>` `HTML` element is the generic container for flow content.
 *
 * It has no effect on the content or layout until styled in some way using CSS (e.g. styling is directly applied to it,
 * or some kind of layout model like Flexbox is applied to its parent element).
 *
 * @link https://html.spec.whatwg.org/multipage/grouping-content.html#the-div-element
 */
final class Div extends Base\AbstractElement
{
    protected string $tagName = 'div';
}
