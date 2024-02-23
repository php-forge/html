<?php

declare(strict_types=1);

namespace PHPForge\Html\Group\Base;

use PHPForge\Html\{
    Attribute\Custom\HasAttributes,
    Attribute\Custom\HasTagName,
    Attribute\Input\HasName,
    Attribute\HasClass,
    Attribute\HasId,
    Attribute\HasLang,
    Attribute\HasStyle,
    Attribute\HasTabindex,
    Attribute\HasTitle,
    Tag
};
use PHPForge\Widget\{Element, ElementInterface};

use function trim;

/**
 * Provides a foundation for creating HTML `<ul>`, `<ol>` elements with various attributes and content.
 */
abstract class AbstractList extends Element
{
    use HasAttributes;
    use HasClass;
    use HasId;
    use HasLang;
    use HasName;
    use HasStyle;
    use HasTabindex;
    use HasTagName;
    use HasTitle;

    protected array $attributes = [];
    protected string $content = '';

    /**
     * Set the `HTML` content value.
     *
     * @param ElementInterface|string ...$values The `HTML` content value.
     *
     * @return static A new instance of the current class with the specified content value.
     */
    public function content(string|ElementInterface ...$values): static
    {
        $new = clone $this;

        foreach ($values as $value) {
            $new->content .= "$value\n";
        }

        return $new;
    }

    /**
     * Generate the HTML representation of the element.
     *
     * @return string The HTML representation of the element.
     */
    protected function run(): string
    {
        return Tag::widget()
            ->attributes($this->attributes)
            ->content(trim($this->content))
            ->id($this->id)
            ->tagName($this->tagName)
            ->render();
    }
}