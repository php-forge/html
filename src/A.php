<?php

declare(strict_types=1);

namespace PHPForge\Html;

/**
 * The `<a>` `HTML` element (or anchor element), with its href attribute, creates a hyperlink to web pages, files, email
 * addresses, locations in the same page, or anything else a URL can address.
 *
 * @link https://html.spec.whatwg.org/multipage/text-level-semantics.html#the-a-element
 */
final class A extends Base\AbstractElement
{
    use Attribute\Aria\HasAriaControls;
    use Attribute\Aria\HasAriaDisabled;
    use Attribute\Aria\HasAriaExpanded;
    use Attribute\Aria\HasAriaLabel;
    use Attribute\Aria\HasRole;
    use Attribute\CanBeAutofocus;
    use Attribute\CanBeHidden;
    use Attribute\HasTabindex;
    use Attribute\Input\HasType;
    use Attribute\Tag\HasDownload;
    use Attribute\Tag\HasHref;
    use Attribute\Tag\HasHreflang;
    use Attribute\Tag\HasPing;
    use Attribute\Tag\HasReferrerpolicy;
    use Attribute\Tag\HasRel;
    use Attribute\Tag\HasTarget;

    protected function run(): string
    {
        return $this->buildElement('a');
    }
}
