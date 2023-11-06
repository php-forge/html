<?php

declare(strict_types=1);

namespace PHPForge\Html\Base;

use PHPForge\Html\Attribute;
use PHPForge\Html\Helper\Encode;
use PHPForge\Html\Ol;
use PHPForge\Html\Tag;
use PHPForge\Html\Ul;
use PHPForge\Widget\Element;

/**
 * Provides a foundation for creating HTML `<li>` elements with various attributes and content.
 */
abstract class AbstractLi extends Element
{
    use Attribute\Custom\HasAttributes;
    use Attribute\HasClass;
    use Attribute\HasId;
    use Attribute\HasLang;
    use Attribute\HasStyle;
    use Attribute\HasTabindex;
    use Attribute\HasTitle;
    use Attribute\Input\HasName;
    use Attribute\Input\HasValue;

    protected array $attributes = [];
    protected string $content = '';

    /**
     * Set the `HTML` content value.
     *
     * @param Ol|self|string|Ul ...$values The `HTML` content value.
     *
     * @return static A new instance of the current class with the specified content value.
     */
    public function content(string|Ol|Ul|self ...$values): static
    {
        $content = '';

        foreach ($values as $value) {
            $content .= "$value\n";
        }

        $new = clone $this;
        $new->content = trim(Encode::santizeXSS($content));

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
            ->tagName('li')
            ->render();
    }
}
