<?php

declare(strict_types=1);

namespace PHPForge\Html\Base;

use PHPForge\Html\Attribute;
use PHPForge\Html\HtmlBuilder;
use PHPForge\Widget\AbstractWidget;

/**
 * This is an abstract class that extends AbstractWidget and serves as a base for generating the <img> tag.
 * The <img> tag represents an image in an HTML document.
 * Concrete classes should extend this class to implement specific <img> tag variations and their generation logic.
 */
abstract class AbstractImg extends AbstractWidget
{
    use Attribute\HasClass;
    use Attribute\HasId;
    use Attribute\Custom\HasAttributes;
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

    protected array $attributes = [];

    protected function run(): string
    {
        return HtmlBuilder::create('img', '', $this->attributes);
    }
}
