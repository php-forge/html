<?php

declare(strict_types=1);

namespace PHPForge\Html\Base;

use PHPForge\Html\Attribute;
use PHPForge\Html\HtmlBuilder;
use PHPForge\Widget\AbstractWidget;

/**
 * This is an abstract class that extends AbstractWidget and serves as a base for creating anchor `(a)` elements.
 * Anchor elements are used to create hyperlinks in HTML documents.
 * Concrete classes should extend this class to implement specific anchor elements and their generation logic.
 */
abstract class AbstractA extends AbstractWidget
{
    use Attribute\CanBeAutofocus;
    use Attribute\CanBeHidden;
    use Attribute\HasClass;
    use Attribute\HasId;
    use Attribute\HasLang;
    use Attribute\HasStyle;
    use Attribute\HasTabindex;
    use Attribute\HasTitle;
    use Attribute\Custom\HasAttributes;
    use Attribute\Custom\HasContent;
    use Attribute\Input\HasName;
    use Attribute\Input\HasType;
    use Attribute\Tag\HasDownload;
    use Attribute\Tag\HasHref;
    use Attribute\Tag\HasHreflang;
    use Attribute\Tag\HasPing;
    use Attribute\Tag\HasReferrerpolicy;
    use Attribute\Tag\HasRel;
    use Attribute\Tag\HasTarget;

    protected array $attributes = [];

    protected function run(): string
    {
        return HtmlBuilder::create('a', $this->content, $this->attributes);
    }
}
