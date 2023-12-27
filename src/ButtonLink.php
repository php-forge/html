<?php

declare(strict_types=1);

namespace PHPForge\Html;

use PHPForge\Widget\Element;

use function array_key_exists;
use function is_bool;

/**
 * The `button` link represents a button styled hyperlink, linking to another resource.
 *
 * @link https://html.spec.whatwg.org/multipage/text-level-semantics.html#the-a-element
 */
final class ButtonLink extends Element
{
    use Attribute\Aria\HasRole;
    use Attribute\Custom\HasAttributes;
    use Attribute\Custom\HasContent;
    use Attribute\Custom\HasPrefixAndSuffix;
    use Attribute\HasClass;
    use Attribute\HasData;
    use Attribute\HasId;
    use Attribute\HasLang;
    use Attribute\HasStyle;
    use Attribute\HasTabindex;
    use Attribute\HasTitle;
    use Attribute\Input\CanBeDisabled;
    use Attribute\Input\HasName;
    use Attribute\Tag\HasHref;

    protected array $attributes = [];

    /**
     * Generate the HTML representation of the element.
     *
     * @return string The HTML representation of the element.
     */
    protected function run(): string
    {
        $attributes = $this->attributes;
        /** @var string $type */
        $type = $attributes['type'] ?? 'button';
        $role = 'button';

        if (array_key_exists('role', $attributes) && is_string($attributes['role'])) {
            $role = $attributes['role'];
        }

        $a = A::widget();

        if (isset($attributes['disabled']) && is_bool($attributes['disabled']) && $attributes['disabled']) {
            $a = $a->ariaDisabled('true')->class('disabled');

            unset($attributes['disabled']);
        }

        return $a->attributes($attributes)->content($this->content)->id($this->id)->role($role)->type($type)->render();
    }
}
