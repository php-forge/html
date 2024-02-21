<?php

declare(strict_types=1);

namespace PHPForge\Html\Textual;

use PHPForge\Html\Attribute\Aria\{HasAriaControls, HasAriaDisabled, HasAriaExpanded, HasAriaLabel, HasRole};
use PHPForge\HTml\Attribute\Tag\{HasDownload, HasHref, HasHreflang, HasPing, HasReferrerpolicy, HasRel, HasTarget};
use PHPForge\Html\Attribute\{CanBeAutofocus, CanBeHidden, Custom\HasContent, Input\HasType, HasTabindex};
use PHPForge\Html\Base;

/**
 * The `<a>` `HTML` element (or anchor element), with its href attribute, creates a hyperlink to web pages, files, email
 * addresses, locations in the same page, or anything else a URL can address.
 *
 * @link https://html.spec.whatwg.org/multipage/text-level-semantics.html#the-a-element
 */
final class A extends Base\AbstractElement
{
    use CanBeAutofocus;
    use CanBeHidden;
    use HasAriaControls;
    use HasAriaDisabled;
    use HasAriaExpanded;
    use HasAriaLabel;
    use HasContent;
    use HasDownload;
    use HasHref;
    use HasHreflang;
    use HasPing;
    use HasReferrerpolicy;
    use HasRel;
    use HasRole;
    use HasTabindex;
    use HasTarget;
    use HasType;

    protected function run(): string
    {
        return $this->buildElement('a', $this->content);
    }
}
