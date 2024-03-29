<?php

declare(strict_types=1);

namespace PHPForge\Html\Group\Base;

use PHPForge\{
    Html\Attribute\Custom\HasAttributes,
    Html\Attribute\HasClass,
    Html\Attribute\HasId,
    Html\Attribute\HasLang,
    Html\Attribute\HasStyle,
    Html\Attribute\HasTabindex,
    Html\Attribute\HasTitle,
    Html\Attribute\Input\HasName,
    Html\Attribute\Input\HasValue,
    Html\Interop\RenderInterface,
    Html\Tag,
    Widget\Element
};

use function trim;

/**
 * Provides a foundation for creating HTML `<li>` elements with various attributes and content.
 */
abstract class AbstractLi extends Element implements RenderInterface
{
    use HasAttributes;
    use HasClass;
    use HasId;
    use HasLang;
    use HasName;
    use HasStyle;
    use HasTabindex;
    use HasTitle;
    use HasValue;

    protected array $attributes = [];
    protected string $content = '';

    /**
     * Set the `HTML` content value.
     *
     * @param RenderInterface|string ...$values The `HTML` content value.
     *
     * @return static A new instance of the current class with the specified content value.
     */
    public function content(string|RenderInterface ...$values): static
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
