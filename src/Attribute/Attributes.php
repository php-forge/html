<?php

declare(strict_types=1);

namespace Forge\Html\Attribute;

use Stringable;

use function array_merge;
use function count;
use function htmlspecialchars;
use function implode;
use function in_array;
use function is_array;
use function is_bool;
use function json_encode;
use function rtrim;
use function strtr;

final class Attributes
{
    private const JSON_FLAGS = JSON_UNESCAPED_UNICODE | JSON_HEX_QUOT | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS |
         JSON_THROW_ON_ERROR;
    private const HTMLSPECIALCHARS_FLAGS = ENT_QUOTES | ENT_HTML5 | ENT_SUBSTITUTE;

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
        'type',
        'id',
        'class',
        'name',
        'value',
        'href',
        'src',
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
     * Encodes special characters into HTML entities for use as a tag content i.e. `<div>tag content</div>`.
     *
     * Characters encoded are: &, <, >.
     *
     * @param mixed $content The content to be encoded.
     * @param bool $doubleEncode If already encoded entities should be encoded.
     * @param string $encoding The encoding to use, defaults to "UTF-8".
     *
     * @return string Encoded content.
     *
     * @link https://html.spec.whatwg.org/#data-state
     */
    public function encode(mixed $content, bool $doubleEncode = true, string $encoding = 'UTF-8'): string
    {
        return htmlspecialchars((string) $content, self::HTMLSPECIALCHARS_FLAGS, $encoding, $doubleEncode);
    }

    /**
     * Encodes special characters into HTML entities for use as HTML tag quoted attribute value
     * i.e. `<input value="my-value">`.
     * Characters encoded are: &, <, >, ", ', U+0000 (null).
     *
     * @param mixed $value The attribute value to be encoded.
     * @param bool $doubleEncode If already encoded entities should be encoded.
     * @param string $encoding The encoding to use, defaults to "UTF-8".
     *
     * @return string Encoded attribute value.
     *
     * @link https://html.spec.whatwg.org/#attribute-value-(single-quoted)-state
     * @link https://html.spec.whatwg.org/#attribute-value-(double-quoted)-state
     */
    public function encodeAttribute(mixed $value, bool $doubleEncode = true, string $encoding = 'UTF-8'): string
    {
        $value = htmlspecialchars((string) $value, self::HTMLSPECIALCHARS_FLAGS, $encoding, $doubleEncode);

        return strtr($value, [
            "\u{0000}" => '&#0;', // U+0000 NULL
        ]);
    }

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

        if (count($attributes) > 1) {
            $sorted = [];
            foreach ($this->order as $name) {
                if (isset($attributes[$name])) {
                    /** @var string[] */
                    $sorted[$name] = $attributes[$name];
                }
            }
            $attributes = array_merge($sorted, $attributes);
        }

        /**
         * @var string $name
         * @var mixed $values
         */
        foreach ($attributes as $name => $values) {
            $html .= $this->renderAttributes($name, $values);
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
        return match (true) {
            is_array($values) && in_array($name, $this->data, true) => $this->renderDataAttributes($name, $values),
            is_array($values) && ($name === 'class') => $this->renderClassAttributes($name, $values),
            is_array($values) && ($name === 'style') => $this->renderStyleAttributes($name, $values),
            is_array($values) => $this->renderAttribute($name, json_encode($values, self::JSON_FLAGS), '\''),
            is_bool($values) => ($values) ? $this->renderAttribute($name) : '',
            null === $values => '',
            default => $this->renderAttribute($name, $this->encodeAttribute($values)),
        };
    }

    private function renderClassAttributes(string $name, array $values): string
    {
        /** @psalm-var string[] $values */
        return match ($values) {
            [] => '',
            default => " $name=\"" . $this->encode(implode(' ', $values)) . '"',
        };
    }

    private function renderDataAttributes(string $name, array $values): string
    {
        $result = '';

        /** @psalm-var array<array-key, array|string|Stringable|null> $values */
        foreach ($values as $n => $v) {
            $result .= match (is_array($v)) {
                true => $this->renderAttribute($name . '-' . $n, json_encode($v, self::JSON_FLAGS), '\''),
                false => $this->renderAttribute($name . '-' . $n, $this->encodeAttribute($v)),
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

        return $result === '' ? '' : " $name=\"" . $this->encode(rtrim($result)) . '"';
    }
}
