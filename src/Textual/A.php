<?php

declare(strict_types=1);

namespace PHPForge\Html\Textual;

use PHPForge\Html\{
    Attribute\Aria\HasAriaControls,
    Attribute\Aria\HasAriaDisabled,
    Attribute\Aria\HasAriaExpanded,
    Attribute\Aria\HasAriaLabel,
    Attribute\Aria\HasRole,
    Attribute\Global\CanBeAutofocus,
    Attribute\Global\CanBeHidden,
    Attribute\Global\HasTabindex,
    Attribute\HasContent,
    Attribute\Input\HasType,
    Attribute\Tag\HasDownload,
    Attribute\Tag\HasHref,
    Attribute\Tag\HasHreflang,
    Attribute\Tag\HasPing,
    Attribute\Tag\HasReferrerpolicy,
    Attribute\Tag\HasRel,
    Attribute\Tag\HasTarget,
    Base\AbstractElement
};

/**
 * The `<a>` `HTML` element (or anchor element), with its href attribute, creates a hyperlink to web pages, files, email
 * addresses, locations in the same page, or anything else a URL can address.
 *
 * @link https://html.spec.whatwg.org/multipage/text-level-semantics.html#the-a-element
 */
final class A extends AbstractElement
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
