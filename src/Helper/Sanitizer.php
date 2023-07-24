<?php

declare(strict_types=1);

namespace PHPForge\Html\Helper;

use Symfony\Component\HtmlSanitizer\HtmlSanitizer;
use Symfony\Component\HtmlSanitizer\HtmlSanitizerConfig;

/**
 * The Sanitizer class provides methods to clean and sanitize HTML content
 * using the Symfony HtmlSanitizer library.
 */
final class Sanitizer
{
    /**
     * @var HtmlSanitizer|null The instance of HtmlSanitizer.
     */
    private static HtmlSanitizer|null $htmlSanitizer = null;

    /**
     * Clean and sanitize the HTML content.
     *
     * @param string $value The HTML content to be sanitized.
     * @return string The sanitized HTML content.
     */
    public static function clean(string $value): string
    {
        return self::createHtmlSanitizer()->sanitize($value);
    }

    /**
     * Create an instance of HtmlSanitizer with the desired configuration.
     *
     * If an instance has already been created, return the existing instance.
     *
     * @return HtmlSanitizer The HtmlSanitizer instance.
     */
    private static function createHtmlSanitizer(): HtmlSanitizer
    {
        if (self::$htmlSanitizer === null) {
            $config = (new HtmlSanitizerConfig())
                // Customize the configuration as needed
                ->allowSafeElements()
                ->allowStaticElements()
                ->forceAttribute('a', 'rel', 'noopener noreferrer')
                ->allowRelativeLinks()
                ->allowRelativeMedias();

            self::$htmlSanitizer = new HtmlSanitizer($config);
        }

        return self::$htmlSanitizer;
    }
}
