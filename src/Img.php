<?php

declare(strict_types=1);

namespace PHPForge\Html;

/**
 * The `<img>` HTML element embeds an image into the document.
 *
 * @link https://html.spec.whatwg.org/multipage/embedded-content.html#the-img-element
 */
final class Img extends Base\AbstractElement
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

    protected function run(): string
    {
        return $this->buildElement('img');
    }
}
