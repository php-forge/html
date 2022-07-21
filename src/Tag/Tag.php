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
     * The `<a>` HTML element (or anchor element), with its href attribute, creates a hyperlink to web pages, files,
     * email addresses, locations in the same page, or anything else a URL can address.
     *
     * @param array $attributes The tag attributes in terms of name-value pairs. These will be rendered as the
     * attributes of the resulting tag. The values will be HTML-encoded using {@see Attributes::encode()}.
     * See {@see Attributes::render()} for details on how attributes are being rendered.
     * @param string $content The content of the tag.
     *
     * @return string The generated <a> HTML element.
     *
     * @link https://html.spec.whatwg.org/multipage/text-level-semantics.html#the-a-element
     *
     * @psalm-param array{
     *   download: bool,
     *   href: string,
     *   hreflang: string,
     *   ping: string,
     *   referrerpolicy: string,
     *   rel: string,
     *   target: string,
     *   type: string,
     * }|array $attributes
     *
     * @link https://html.spec.whatwg.org/multipage/links.html#attr-hyperlink-download
     * @link https://www.w3.org/TR/html52/links.html#element-attrdef-a-href
     * @link https://html.spec.whatwg.org/multipage/links.html#attr-hyperlink-hreflang
     * @link https://html.spec.whatwg.org/multipage/links.html#ping
     * @link https://html.spec.whatwg.org/multipage/links.html#attr-hyperlink-referrerpolicy
     * @link https://www.w3.org/TR/html52/links.html#element-attrdef-a-rel
     * @link https://html.spec.whatwg.org/multipage/links.html#attr-hyperlink-target
     * @link https://html.spec.whatwg.org/multipage/links.html#attr-hyperlink-type
     */
    public static function a(array $attributes = [], string $content = ''): string
    {
        return tag::create('a', $content, $attributes);
    }

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
     * The `<button>` HTML element is an interactive element activated by a user with a mouse, keyboard, finger, voice
     * command, or other assistive technology. Once activated, it then performs a programmable action, such as
     * submitting a form or opening a dialog.
     *
     * @param array $attributes The tag attributes in terms of name-value pairs. These will be rendered as the
     * attributes of the resulting tag. The values will be HTML-encoded using {@see Attributes::encode()}.
     * See {@see Attributes::render()} for details on how attributes are being rendered.
     * @param string $content The content of the tag.
     *
     * @return string The generated <button> HTML element.
     *
     * @link https://html.spec.whatwg.org/multipage/form-elements.html#the-button-element
     *
     * @psalm-param array{
     *   disabled: bool,
     *   form: string,
     *   formaction: string,
     *   formenctype: string,
     *   formmethod: string,
     *   formnovalidate: bool,
     *   formtarget: string,
     *   name: string,
     *   type: string,
     *   value: string
     * }|array $attributes
     *
     * @link https://html.spec.whatwg.org/multipage/form-control-infrastructure.html#attr-fe-disabled
     * @link https://html.spec.whatwg.org/multipage/form-control-infrastructure.html#attr-fae-form
     * @link https://html.spec.whatwg.org/multipage/form-control-infrastructure.html#attr-fs-formaction
     * @link https://html.spec.whatwg.org/multipage/form-control-infrastructure.html#attr-fs-formenctype
     * @link https://html.spec.whatwg.org/multipage/form-control-infrastructure.html#attr-fs-formmethod
     * @link https://html.spec.whatwg.org/multipage/form-control-infrastructure.html#attr-fs-formnovalidate
     * @link https://html.spec.whatwg.org/multipage/form-control-infrastructure.html#attr-fs-formtarget
     * @link https://html.spec.whatwg.org/multipage/form-control-infrastructure.html#attr-fe-name
     * @link https://html.spec.whatwg.org/multipage/form-elements.html#attr-button-type
     * @link https://html.spec.whatwg.org/multipage/form-elements.html#attr-button-value
     */
    public static function button(array $attributes = [], string $content = ''): string
    {
        if (!isset($attributes['type'])) {
            $attributes['type'] = 'button';
        }

        return Tag::create('button', $content, $attributes);
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
     * The `<li>` HTML element is used to represent an item in a list.
     * It must be contained in a parent element: an ordered list (`<ol>`), an unordered list (`<ul>`), or a menu
     * (`<menu>`).
     * In menus and unordered lists, list items are usually displayed using bullet points.
     * In ordered lists, they are usually displayed with an ascending counter on the left, such as a number or letter.
     *
     * @param array $attributes The tag attributes in terms of name-value pairs. These will be rendered as the
     * attributes of the resulting tag. The values will be HTML-encoded using {@see Attributes::encode()}.
     * See {@see Attributes::render()} for details on how attributes are being rendered.
     * @param string $content The content of the tag.
     *
     * @return string The generated `<li>` HTML element.
     *
     * @psalm-param array{value: mixed}|array $attributes
     *
     * @link https://html.spec.whatwg.org/multipage/grouping-content.html#attr-li-value
     */
    public static function li(array $attributes = [], string $content = ''): string
    {
        return Tag::create('li', $content, $attributes);
    }

    /**
     * The `<ul>` HTML element represents an unordered list of items, typically rendered as a bulleted list.
     *
     * @param array $attributes The tag attributes in terms of name-value pairs. These will be rendered as the
     * attributes of the resulting tag. The values will be HTML-encoded using {@see Attributes::encode()}.
     * See {@see Attributes::render()} for details on how attributes are being rendered.
     * @param array $items The list items. Each item is an array with the following keys:
     * - content: (required) The content of the list item.
     * - attributes: The HTML attributes of the list item.
     *
     * @return string The generated `<ul>` HTML element.
     *
     * @link https://html.spec.whatwg.org/multipage/grouping-content.html#the-ul-element
     */
    public static function ul(array $attributes = [], array $items = []): string
    {
        $li = '';

        /** @psalm-var array[] $items */
        foreach ($items as $item) {
            /** @var array */
            $liAttributes = $item['attributes'] ?? [];
            /** @var string */
            $liContent = $item['content'] ?? '';
            $liTag = Tag::li($liAttributes, $liContent);
            $li .= $item === end($items) ? $liTag : $liTag . PHP_EOL;
        }

        return Tag::create('ul', $li, $attributes);
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
