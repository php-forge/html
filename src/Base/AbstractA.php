<?php

declare(strict_types=1);

namespace PHPForge\Html\Base;

use PHPForge\Html\Attribute;

/**
 * Provides a foundation for creating HTML `<a>` elements with various attributes and content.
 */
abstract class AbstractA extends AbstractElement
{
    use Attribute\CanBeAutofocus;
    use Attribute\CanBeHidden;
    use Attribute\HasData;
    use Attribute\Input\HasType;
    use Attribute\Tag\HasDownload;
    use Attribute\Tag\HasHref;
    use Attribute\Tag\HasHreflang;
    use Attribute\Tag\HasPing;
    use Attribute\Tag\HasReferrerpolicy;
    use Attribute\Tag\HasRel;
    use Attribute\Tag\HasTarget;

    protected string $tagName = 'a';
}
