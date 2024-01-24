<?php

declare(strict_types=1);

namespace PHPForge\Html\Base;

use PHPForge\Html\Attribute;
use PHPForge\Html\Helper\Encode;
use PHPForge\Html\Li;
use PHPForge\Html\Tag;
use PHPForge\Widget\Element;

use function trim;

/**
 * Provides a foundation for creating HTML `<ul>`, `<ol>` elements with various attributes and content.
 */
abstract class AbstractList extends Element
{
    use Attribute\Custom\HasAttributes;
    use Attribute\Custom\HasTagName;
    use Attribute\HasClass;
    use Attribute\HasId;
    use Attribute\HasLang;
    use Attribute\HasStyle;
    use Attribute\HasTabindex;
    use Attribute\HasTitle;
    use Attribute\Input\HasName;
    use Attribute\Input\HasType;

    protected array $attributes = [];
    protected string $content = '';
    protected string $tagName = '';

    /**
     * Set the `HTML` content value.
     *
     * @param Li|self|string ...$values The `HTML` content value.
     *
     * @return static A new instance of the current class with the specified content value.
     */
    public function content(string|Li|self ...$values): static
    {
        $content = '';

        foreach ($values as $value) {
            $content .= "$value\n";
        }

        $new = clone $this;
        $new->content = trim(Encode::sanitizeXSS($content));

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
            ->content($this->content)
            ->id($this->id)
            ->tagName($this->tagName)
            ->type($this->type)
            ->render();
    }
}
