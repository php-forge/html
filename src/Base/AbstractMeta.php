<?php

declare(strict_types=1);

namespace PHPForge\Html\Base;

use PHPForge\Html\Attribute;
use PHPForge\Html\Helper\Encode;
use PHPForge\Html\HtmlBuilder;
use PHPForge\Widget\AbstractWidget;

/**
 * This is an abstract class that extends AbstractWidget and serves as a base for generating the `<meta>` tag.
 * The `<meta>` tag provides metadata about the HTML document.
 * Concrete classes should extend this class to implement specific `<meta>` tag variations and their generation logic.
 */
abstract class AbstractMeta extends AbstractWidget
{
    use Attribute\HasClass;
    use Attribute\HasId;
    use Attribute\Custom\HasAttributes;
    use Attribute\Tag\HasCharset;
    use Attribute\Tag\HasHttpEquiv;
    use Attribute\Tag\HasProperty;

    protected array $attributes = [];

    /**
     * Returns a new instance with the name and content attributes of the meta tag.
     *
     * @param string $value The name value.
     * @param string $content The content value.
     */
    public function name(string $value, string $content): self
    {
        $new = clone $this;
        $new->attributes['name'] = $value;
        $new->attributes['content'] = Encode::content($content);

        return $new;
    }

    protected function run(): string
    {
        return HtmlBuilder::create('meta', '', $this->attributes);
    }
}
