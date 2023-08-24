<?php

declare(strict_types=1);

namespace PHPForge\Html\Base;

use PHPForge\Html\Attribute;
use PHPForge\Html\Helper\Encode;
use PHPForge\Html\HtmlBuilder;
use PHPForge\Widget\Element;

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
     * Returns a new instance with the name and content attributes of the meta tag.
     *
     * @param string $value The name value.
     * @param string $content The content value.
     */
    public function name(string $value, string $content): self
    {
        $new = clone $this;
        $new->attributes['name'] = $value;
        $new->attributes['content'] = Encode::create()->content($content);

        return $new;
    }

    protected function run(): string
    {
        return HtmlBuilder::create('meta', '', $this->attributes);
    }
}
