<?php

declare(strict_types=1);

namespace PHPForge\Html\Helper;

use InvalidArgumentException;
use UnexpectedValueException;

use function mb_strtolower;
use function preg_match;
use function preg_replace;
use function str_replace;
use function strlen;
use function strrchr;
use function strrpos;
use function substr;

/**
 * Utils provides a set of static methods for common tasks.
 */
final class Utils
{
    /**
     * Generate arrayable name from string.
     *
     * @param string $name String to convert.
     */
    public static function generateArrayableName(string $name): string
    {
        return !str_ends_with($name, '[]') ? $name . '[]' : $name;
    }

    /**
     * Generates an appropriate input ID for the specified attribute name or expression.
     *
     * This method converts the result {@see generateInputName()} into a valid input ID.
     *
     * For example, if {@see generateInputName()} returns `Post[content]`, this method will return `post-content`.
     *
     * @param string $formName The form name.
     * @param string $attribute The attribute name or expression.
     * @param string $charset default `UTF-8`.
     *
     * @throws InvalidArgumentException If the attribute name contains non-word characters.
     * @throws UnexpectedValueException If charset is unknown
     *
     * @return string the generated input ID.
     */
    public static function generateInputId(
        string $formName = '',
        string $attribute = '',
        string $charset = 'UTF-8'
    ): string {
        $name = mb_strtolower(self::generateInputName($formName, $attribute), $charset);

        return str_replace(['[]', '][', '[', ']', ' ', '.'], ['', '-', '-', '', '-', '-'], $name);
    }

    /**
     * Generates an appropriate input name for the specified attribute name or expression.
     *
     * This method generates a name that can be used as the input name to collect user input for the specified
     * attribute. The name is generated according to the of the form and the given attribute name. For example, if the
     * form name of the `Post` form is `Post`, then the input name generated for the `content` attribute would be
     * `Post[content]`.
     *
     * If the attribute is an array, or a model attribute that is an array, the arrayable input name can be generated
     * by setting the `$arrayable` parameter to `true`. For example, if the form name of the `Post` form is `Post`, then
     * the input name generated for the `tags[]` attribute would be `Post[tags][]`.
     *
     * @param string $formName The form name.
     * @param string $attribute The attribute name or expression.
     * @param bool $arrayable Whether to generate an arrayable input name. This is mainly used in tabular data input.
     *
     * @throws InvalidArgumentException If the attribute name contains non-word characters or empty form name for
     * tabular inputs
     */
    public static function generateInputName(string $formName, string $attribute, bool $arrayable = false): string
    {
        if ($arrayable === true) {
            $attribute = self::generateArrayableName($attribute);
        }

        $data = self::parseAttribute($attribute);

        if ($formName === '' && $data['prefix'] === '') {
            return $attribute;
        }

        if ($formName !== '') {
            return $formName . $data['prefix'] . '[' . $data['name'] . ']' . $data['suffix'];
        }

        throw new InvalidArgumentException('The form name cannot be empty for tabular inputs.');
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
     */
    public static function normalizeRegexpPattern(string $regexp, ?string $delimiter = null): string
    {
        if (strlen($regexp) < 2) {
            throw new InvalidArgumentException('The length of the regular expression cannot be less than 2.');
        }

        $pattern = preg_replace('/\\\\x{?([0-9a-fA-F]+)}?/', '\u$1', $regexp);

        if ($delimiter === null) {
            $delimiter = $pattern[0];
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

    /**
     * Returns the short name of the given class.
     *
     * @param string $class The class name.
     */
    public static function shortNameClass(string $class): string
    {
        return substr(strrchr($class, '\\'), 1) . '::class';
    }

    /**
     * This method parses an attribute expression and returns an associative array containing real attribute name,
     * prefix, and suffix.
     *
     * For example, `['name' => 'content', 'prefix' => '', 'suffix' => '[0]']`
     *
     * An attribute expression is an attribute name prefixed and/or suffixed with array indexes. It is mainly used in
     * tabular data input and/or input of an array type. Below are some examples:
     *
     * - `[0]content` is used in tabular data input to represent the "content" attribute for the first model in tabular
     *    input;
     * - `dates[0]` represents the first array element of the "dates" attribute;
     * - `[0]dates[0]` represents the first array element of the "dates" attribute for the first model in tabular
     *    input.
     *
     * @param string $attribute The attribute name or expression
     *
     * @throws InvalidArgumentException If the attribute name contains non-word characters.
     *
     * @psalm-return string[]
     */
    private static function parseAttribute(string $attribute): array
    {
        if (!preg_match('/(^|.*\])([\w\.\+\-_]+)(\[.*|$)/u', $attribute, $matches)) {
            throw new InvalidArgumentException('Attribute name must contain word characters only.');
        }

        return [
            'name' => $matches[2],
            'prefix' => $matches[1],
            'suffix' => $matches[3],
        ];
    }
}
