<?php

declare(strict_types=1);

namespace Forge\Html\Tag\Element;

use Forge\Html\Attribute\Attributes;
use Forge\Html\Tag\Tag;

/**
 * The <a> HTML element (or anchor element), with its href attribute, creates a hyperlink to web pages, files, email
 * addresses, locations in the same page, or anything else a URL can address.
 *
 * @link https://html.spec.whatwg.org/multipage/text-level-semantics.html#the-a-element
 */
final class A
{
    /**
     * The created <a> HTML element.
     *
     * @param array $attributes The tag attributes in terms of name-value pairs. These will be rendered as the
     * attributes of the resulting tag. The values will be HTML-encoded using {@see Attributes::encode()}.
     * See {@see Attributes::render()} for details on how attributes are being rendered.
     * @param string $content The content of the tag.
     *
     * @return string The generated li tag.
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
    public function create(array $attributes = [], string $content = ''): string
    {
        return (new Tag())->create('a', $content, $attributes);
    }
}
