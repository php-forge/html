<?php

declare(strict_types=1);

namespace PHPForge\Html\Helper;

use PHPForge\Widget\ElementInterface;
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
     * @var array<string>
     */
    private static array $removeEvilAttributes = [
        'form',
        'style',
    ];
    /**
     * @var array<string>
     */
    private static array $removeEvilHtmlTags = [
        'button',
        'form',
        'input',
        'select',
        'svg',
        'textarea',
    ];

    /**
     * Initialize the class with custom configuration.
     *
     * @psalm-param array<string> $removeEvilAttributes
     * @psalm-param array<string> $removeEvilHtmlTags
     */
    public static function initialize(array $removeEvilAttributes = [], array $removeEvilHtmlTags = []): void
    {
        self::$removeEvilAttributes = $removeEvilAttributes;
        self::$removeEvilHtmlTags = $removeEvilHtmlTags;
    }

    /**
     * Encodes special characters into HTML entities for use as a tag content i.e. `<div>tag content</div>`.
     *
     * Characters encoded are: &, <, >.
     *
     * @param string $content The content to be encoded.
     * @param bool $doubleEncode If already encoded, entities should be encoded.
     * @param string $encoding The encoding to use, defaults to "UTF-8".
     *
     * @return string Encoded content.
     *
     * @link https://html.spec.whatwg.org/#data-state
     */
    public static function content(string $content, bool $doubleEncode = true, string $encoding = 'UTF-8'): string
    {
        return htmlspecialchars($content, self::HTMLSPECIALCHARS_FLAGS, $encoding, $doubleEncode);
    }

    /**
     * Encodes special characters into HTML entities for use as HTML tag quoted attribute value
     * i.e. `<input value="my-value">`.
     * Characters encoded are: &, <, >, ", ', U+0000 (null).
     *
     * @param mixed $value The attribute value to be encoded.
     * @param bool $doubleEncode If already encoded, entities should be encoded.
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

        return strtr($value, [
            '\u{0000}' => '&#0;',
        ]); // U+0000 NULL
    }

    /**
     * Sanitizes HTML content to prevent XSS attacks.
     *
     * @param ElementInterface|string ...$values The HTML content to sanitize.
     *
     * @return string The sanitized HTML content.
     */
    public static function sanitizeXSS(string|ElementInterface ...$values): string
    {
        $cleanHtml = '';

        foreach ($values as $value) {
            if ($value instanceof ElementInterface) {
                $value = $value->render();
            }

            /** @psalm-var string|string[] $cleanValue */
            $cleanValue = self::cleanXSS($value);
            $cleanValue = is_array($cleanValue) ? implode('', $cleanValue) : $cleanValue;

            $cleanHtml .= $cleanValue;
        }

        return $cleanHtml;
    }

    private static function cleanXSS(string $content): string|array
    {
        $antiXss = new AntiXSS();

        $antiXss->removeEvilAttributes(self::$removeEvilAttributes);
        $antiXss->removeEvilHtmlTags(self::$removeEvilHtmlTags);

        return $antiXss->xss_clean($content);
    }
}
