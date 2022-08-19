<?php

declare(strict_types=1);

namespace Forge\Html\Helper;

use InvalidArgumentException;
use ValueError;

use function substr;

final class Utils
{
    /**
     * Generate arrayable name from string.
     *
     * @param string $name String to convert.
     *
     * @return string
     */
    public static function generateArrayableName(string $name): string
    {
        return substr($name, -2) !== '[]' ? $name . '[]' : $name;
    }

    /**
     * Normalize PCRE regular expression to use in the "pattern" HTML attribute:
     *  - convert \x{FFFF} to \uFFFF;
     *  - remove flags and delimiters.
     *
     * For example:
     *
     * ```php
     * Utils::normalizeRegexpPattern('/([a-z0-9-]+)/im'); // will return: ([a-z0-9-]+)
     * ```
     *
     * @link https://html.spec.whatwg.org/multipage/input.html#the-pattern-attribute
     *
     * @param string $regexp PCRE regular expression.
     * @param string|null $delimiter Regular expression delimiter.
     *
     * @throws InvalidArgumentException If incorrect regular expression or delimiter
     *
     * @return string
     */
    public static function normalizeRegexpPattern(string $regexp, ?string $delimiter = null): string
    {
        if (strlen($regexp) < 2) {
            throw new InvalidArgumentException('The length of the regular expression cannot be less than 2.');
        }

        $pattern = preg_replace('/\\\\x{?([0-9a-fA-F]+)}?/', '\u$1', $regexp);

        if ($delimiter === null) {
            $delimiter = substr($pattern, 0, 1);
        }

        if (strlen($delimiter) !== 1) {
            throw new InvalidArgumentException('Incorrect delimiter.');
        }

        $endPosition = strrpos($pattern, $delimiter, 1);

        if ($endPosition === false) {
            throw new InvalidArgumentException('Incorrect regular expression.');
        }

        return substr($pattern, 1, $endPosition - 1);
    }
}
