<?php

declare(strict_types=1);

namespace PHPForge\Html\Helper;

use Stringable;

use function array_merge;
use function gettype;
use function implode;
use function in_array;
use function is_array;
use function json_encode;
use function rtrim;

/**
 * Attributes is a helper class that provides a set of helper methods for managing HTML tag attributes.
 */
final class Attributes
{
    private const JSON_FLAGS = JSON_UNESCAPED_UNICODE | JSON_HEX_QUOT | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS |
         JSON_THROW_ON_ERROR;

    /**
     * @var array list of tag attributes that should be specially handled when their values are of array type.
     *
     * In particular, if the value of the `data` attribute is `['name' => 'xyz', 'age' => 13]`, two attributes will be
     * generated instead of one: `data-name="xyz" data-age="13"`.
     */
    private array $data = ['aria', 'data', 'data-ng', 'ng'];

    /**
     * @var array the preferred order of attributes in a tag. This mainly affects the order of the attributes that are
     * rendered by {@see render()}.
     *
     * @psalm-var string[]
     */
    private array $order = [
        'class',
        'id',
        'name',
        'type',
        'value',
        'href',
        'src',
        'for',
        'title',
        'alt',
        'role',
        'tabindex',
        'srcset',
        'form',
        'action',
        'method',
        'selected',
        'checked',
        'readonly',
        'disabled',
        'multiple',
        'size',
        'maxlength',
        'width',
        'height',
        'rows',
        'cols',
        'alt',
        'title',
        'rel',
        'media',
    ];

    /**
     * Renders the HTML tag attributes.
     *
     * Attributes whose values are of boolean type will be treated as
     * [boolean attributes](http://www.w3.org/TR/html5/infrastructure.html#boolean-attributes).
     *
     * Attributes whose values are null will not be rendered.
     *
     * The values of attributes will be HTML-encoded using {@see encode()}.
     *
     * @param array $attributes Attributes to be rendered. The attribute values will be HTML-encoded using
     * {@see Encode}.
     *
     * `aria` and `data` attributes get special handling when they are set to an array value. In these cases, the array
     * will be "expanded" and a list of ARIA/data attributes will be rendered. For example,
     * `'aria' => ['role' => 'checkbox', 'value' => 'true']` would be rendered as
     * `aria-role="checkbox" aria-value="true"`.
     *
     * If a nested `data` value is set to an array, it will be JSON-encoded. For example,
     * `'data' => ['params' => ['id' => 1, 'name' => 'yii']]` would be rendered as
     * `data-params='{"id":1,"name":"yii"}'`.
     *
     * @return string The rendering result. If the attributes are not empty, they will be rendered into a string with a
     * leading white space (so that it can be directly appended to the tag name in a tag). If there is no attribute, an
     * empty string will be returned.
     *
     * {@see addCssClass()}
     */
    public function render(array $attributes): string
    {
        $html = '';
        $sorted = [];

        foreach ($this->order as $name) {
            if (isset($attributes[$name])) {
                /** @psalm-var string[] */
                $sorted[$name] = $attributes[$name];
            }
        }

        $attributes = array_merge($sorted, $attributes);

        /**
         * @var string $name
         * @var mixed $values
         */
        foreach ($attributes as $name => $values) {
            if ($name !== '' && $values !== '' && $values !== null) {
                $html .= $this->renderAttributes($name, $values);
            }
        }

        return $html;
    }

    private function renderAttribute(string $name, string $encodedValue = '', string $quote = '"'): string
    {
        if ($encodedValue === '') {
            return ' ' . $name;
        }

        return ' ' . $name . '=' . $quote . $encodedValue . $quote;
    }

    private function renderAttributes(string $name, mixed $values): string
    {
        return match (gettype($values)) {
            'array' => $this->renderArrayAttributes($name, $values),
            'boolean' => $this->renderBooleanAttributes($name, $values),
            default => $this->renderAttribute($name, Encode::create()->value($values)),
        };
    }

    private function renderArrayAttributes(string $name, array $values): string
    {
        $attributes = $this->renderAttribute($name, json_encode($values, self::JSON_FLAGS), '\'');

        if (in_array($name, $this->data, true)) {
            $attributes = $this->renderDataAttributes($name, $values);
        }

        if ($name === 'class') {
            $attributes = $this->renderClassAttributes($name, $values);
        }

        if ($name === 'style') {
            $attributes = $this->renderStyleAttributes($name, $values);
        }

        return $attributes;
    }

    private function renderBooleanAttributes(string $name, bool $value): string
    {
        return $value === true ? $this->renderAttribute($name) : '';
    }

    private function renderClassAttributes(string $name, array $values): string
    {
        /** @psalm-var string[] $values */
        return match ($values) {
            [] => '',
            default => " $name=\"" . Encode::create()->content(implode(' ', $values)) . '"',
        };
    }

    private function renderDataAttributes(string $name, array $values): string
    {
        $result = '';

        /** @psalm-var array<array-key, array|string|Stringable|null> $values */
        foreach ($values as $n => $v) {
            $result .= match (is_array($v)) {
                true => $this->renderAttribute($name . '-' . $n, json_encode($v, self::JSON_FLAGS), '\''),
                false => $this->renderAttribute($name . '-' . $n, Encode::create()->value($v)),
            };
        }

        return $result;
    }

    private function renderStyleAttributes(string $name, array $values): string
    {
        $result = '';

        /** @psalm-var string[] $values */
        foreach ($values as $n => $v) {
            $result .= "$n: $v; ";
        }

        return $result === '' ? '' : " $name=\"" . Encode::create()->content(rtrim($result)) . '"';
    }
}
