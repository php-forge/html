<?php

declare(strict_types=1);

namespace PHPForge\Html\Multimedia;

use PHPForge\Html\{
    Attribute\Input\HasAlt,
    Attribute\Input\HasHeight,
    Attribute\Input\HasSrc,
    Attribute\Input\HasWidth,
    Attribute\Tag\HasCrossorigin,
    Attribute\Tag\HasIsmap,
    Attribute\Tag\HasLoading,
    Attribute\Tag\HasReferrerpolicy,
    Attribute\Tag\HasSizes,
    Attribute\Tag\HasSrcset,
    Base\AbstractElement
};

/**
 * The `<img>` HTML element embeds an image into the document.
 *
 * @link https://html.spec.whatwg.org/multipage/embedded-content.html#the-img-element
 */
final class Img extends AbstractElement
{
    use HasAlt;
    use HasCrossorigin;
    use HasHeight;
    use HasIsmap;
    use HasLoading;
    use HasReferrerpolicy;
    use HasSizes;
    use HasSrc;
    use HasSrcset;
    use HasWidth;

    protected function run(): string
    {
        return $this->buildElement('img');
    }
}
