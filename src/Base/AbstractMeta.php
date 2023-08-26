<?php

declare(strict_types=1);

namespace PHPForge\Html\Base;

use PHPForge\Html\Attribute;
use PHPForge\Html\Helper\Encode;
use PHPForge\Html\HtmlBuilder;
use PHPForge\Widget\Element;

/**
 * Provides a foundation for creating HTML `meta` elements with various attributes and content.
 */
abstract class AbstractMeta extends Element
{
    use Attribute\Custom\HasAttributes;
    use Attribute\HasClass;
    use Attribute\HasId;
    use Attribute\HasLang;
    use Attribute\Tag\HasCharset;
    use Attribute\Tag\HasHttpEquiv;
    use Attribute\Tag\HasProperty;

    protected array $attributes = [];

    /**
     * Sets the name and content attributes.
     *
     * @param string $value The name value.
     * @param string $content The content value.
     *
     * @return static A new instance with the name and content attributes.
     */
    public function content(string $value, string $content): static
    {
        $new = clone $this;
        $new->attributes['name'] = $value;
        $new->attributes['content'] = Encode::create()->content($content);

        return $new;
    }

    /**
     * Generate the HTML representation of the element.
     *
     * @return string The HTML representation of the element.
     */
    protected function run(): string
    {
        return HtmlBuilder::create('meta', '', $this->attributes);
    }
}
