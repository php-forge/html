<?php

declare(strict_types=1);

namespace PHPForge\Html\Base;

use PHPForge\Html\Attribute;

/**
 * Provides a foundation for creating HTML `img` elements with various attributes and content.
 */
abstract class AbstractImg extends AbstractElement
{
    use Attribute\Input\HasAlt;
    use Attribute\Input\HasHeight;
    use Attribute\Input\HasSrc;
    use Attribute\Input\HasWidth;
    use Attribute\Tag\HasCrossorigin;
    use Attribute\Tag\HasIsmap;
    use Attribute\Tag\HasLoading;
    use Attribute\Tag\HasReferrerpolicy;
    use Attribute\Tag\HasSizes;
    use Attribute\Tag\HasSrcset;

    protected string $tagName = 'img';
}
