<?php

declare(strict_types=1);

namespace PHPForge\Html\Base;

use PHPForge\Html\Attribute;
use PHPForge\Html\Tag;
use PHPForge\Widget\Element;
use PHPForge\Widget\ElementInterface;

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
            ->tagName('li')
            ->render();
    }
}
