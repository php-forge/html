<?php

declare(strict_types=1);

namespace Forge\Html\Tag;

use Forge\Html\Attribute\Attributes;
use InvalidArgumentException;

use function in_array;
use function strtolower;

final class Tag
{
    /** @var array<array-key, string> */
    private const INLINE_ELEMENTS = [
        'a',
        'abbr',
        'acronym',
        'audio',
        'b',
        'bdi',
        'bdo',
        'big',
        'br',
        'button',
        'canvas',
        'cite',
        'code',
        'data',
        'datalist',
        'del',
        'dfn',
        'em',
        'embed',
        'i',
        'iframe',
        'img',
        'input',
        'ins',
        'kbd',
        'label',
        'map',
        'mark',
        'meter',
        'noscript',
        'object',
        'output',
        'picture',
        'progress',
        'q',
        'ruby',
        's',
        'samp',
        'script',
        'select',
        'slot',
        'small',
        'span',
        'strong',
        'sub',
        'sup',
        'svg',
        'template',
        'textarea',
        'time',
        'u',
        'tt',
        'var',
        'video',
        'wbr',
    ];

    /** @var array<array-key, string> */
    private const VOID_ELEMENT = [
        'area',
        'base',
        'br',
        'col',
        'command',
        'embed',
        'hr',
        'img',
        'input',
        'keygen',
        'link',
        'meta',
        'param',
        'source',
        'track',
        'wbr',
    ];

    /**
     * Create a new open tag.
     *
     * @param string $tag The tag name.
     * @param array $attributes The tag attributes.
     *
     * @return string The open tag.
     */
    public static function begin(string $tag, array $attributes = []): string
    {
        $helperAttributes = new Attributes();
        $tag = self::validateTag($tag);

        return '<' . $tag . $helperAttributes->render($attributes) . '>';
    }

    /**
     * Create a closing tag.
     *
     * @param string $tag The tag name.
     *
     * @return string The closing tag.
     */
    public static function end(string $tag): string
    {
        $tag = self::validateTag($tag);

        return '</' . $tag . '>';
    }

    /**
     * Create a self-closing tag.
     *
     * @param string $tag The tag name.
     * @param string $content The content of the tag.
     * @param array $attributes The attributes of the tag.
     *
     * @return string The tag.
     */
    public static function create(string $tag, string $content = '', array $attributes = []): string
    {
        $helperAttributes = new Attributes();
        $tag = self::validateTag($tag);
        $voidElement = "<$tag" . $helperAttributes->render($attributes) . '>';

        if (self::voidElements($tag)) {
            return $voidElement;
        }

        if (self::inlinedElements($tag)) {
            return $voidElement . $content . '</' . $tag . '>';
        }

        $content = $content === '' ? '' : $content . PHP_EOL;

        return $voidElement . PHP_EOL . $content . '</' . $tag . '>';
    }

    /**
     * @return bool True if tag is inlined element.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Inline_elements
     */
    private static function inlinedElements(string $tag): bool
    {
        return in_array($tag, self::INLINE_ELEMENTS, true);
    }

    /**
     * @return bool True if tag is void element.
     *
     * @link http://www.w3.org/TR/html-markup/syntax.html#void-element
     */
    private static function voidElements(string $tag): bool
    {
        return in_array($tag, self::VOID_ELEMENT, true);
    }

    /**
     * @throws InvalidArgumentException
     */
    private static function validateTag(string $tag): string
    {
        $tag = strtolower($tag);

        if ($tag === '') {
            throw new InvalidArgumentException('Tag name cannot be empty.');
        }

        return $tag;
    }
}
