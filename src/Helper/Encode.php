<?php

declare(strict_types=1);

namespace PHPForge\Html\Helper;

use voku\helper\AntiXSS;

use function htmlspecialchars;
use function strtr;

/**
 * Encode provides methods for encoding HTML special characters.
 */
final class Encode
{
    private const HTMLSPECIALCHARS_FLAGS = ENT_QUOTES | ENT_HTML5 | ENT_SUBSTITUTE;

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
    public static function content(mixed $content, bool $doubleEncode = true, string $encoding = 'UTF-8'): string
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
    public static function value(mixed $value, bool $doubleEncode = true, string $encoding = 'UTF-8'): string
    {
        $value = htmlspecialchars((string) $value, self::HTMLSPECIALCHARS_FLAGS, $encoding, $doubleEncode);

        return strtr($value, ['\u{0000}' => '&#0;']); // U+0000 NULL
    }

    public static function cleanXSS(string $content): string|array
    {
        $antiXss = new AntiXSS();

        $antiXss->removeEvilHtmlTags(['button', 'input', 'select', 'svg', 'textarea']);

        return $antiXss->xss_clean($content);
    }
}
