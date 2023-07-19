<?php

declare(strict_types=1);

namespace PHPForge\Html\Helper;

use function implode;
use function preg_match;
use function preg_split;
use function strtolower;
use function ucfirst;

/**
 * Provides methods to manipulate and format words within a text string, including capitalization, case conversion,
 * and other word-related operations.
 */
final class WordFormatter
{
    /**
     * Converts a string to words with capitalized first letters.
     *
     * This function takes a string as input and converts it into words with the first letter of each word capitalized.
     * The input string can be in different formats, such as camelCase or snake_case, and the function will handle them properly.
     * If the input string is in all uppercase, it will be treated as a single word and capitalized accordingly.
     *
     * @param string $string The input string to be converted.
     *
     * @return string The string with words having capitalized first letters separated by spaces.
     */
    public static function capitalizeToWords(string $string): string
    {
        if (preg_match('/^[A-Z][^_]*(_[A-Z][^_]*)*/', $string)) {
            $strings = explode('_', $string);
            $word = '';

            foreach ($strings as $index => $string) {
                $word .= match ($index === 0) {
                    true => ucfirst(strtolower($string)),
                    default => ' ' . ucfirst(strtolower($string)),
                };
            }

            return $word;
        }

        $capitalizedWords = [];
        $words = preg_split('/(?=[A-Z])|_/', $string);

        foreach ($words as $word) {
            $capitalizedWords[] = ucfirst($word);
        }

        return implode(' ', $capitalizedWords);
    }
}
