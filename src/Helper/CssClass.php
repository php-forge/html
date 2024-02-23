<?php

declare(strict_types=1);

namespace PHPForge\Html\Helper;

use function implode;
use function in_array;
use function is_array;
use function is_int;
use function preg_split;

/**
 * CssClass provides a set of static methods for managing CSS classes.
 */
final class CssClass
{
    /**
     * Adds a CSS class (or several classes) to the specified options.
     *
     * If the CSS class is already in the options, it will not be added again. If class specification at given options
     * is an array, and some class placed there with the named (string) key, overriding of such a key will have no
     * effect.
     *
     * @param array $attributes The attributes to be modified.
     * @param array|string $class The CSS class(es) to be added.
     * @param bool $override Whether to override existing CSS class(es) with new one.
     *
     * @psalm-param string|string[] $class
     */
    public static function add(array &$attributes, array|string $class, bool $override = false): void
    {
        if ($class === '' || $class === []) {
            return;
        }

        if ($override) {
            $classArray = is_array($class)
                ? $class
                : preg_split('/\s+/', $class, flags: PREG_SPLIT_NO_EMPTY);

            $attributes['class'] = implode(' ', $classArray);

            return;
        }

        if (isset($attributes['class'])) {
            /** @psalm-var string[] $existingClasses */
            $existingClasses = is_array($attributes['class'])
                ? $attributes['class']
                : preg_split(
                    '/\s+/',
                    is_string($attributes['class']) ? $attributes['class'] : '',
                    flags: PREG_SPLIT_NO_EMPTY
                );

            $newClasses = is_array($class)
                ? $class
                : preg_split('/\s+/', $class, -1, PREG_SPLIT_NO_EMPTY);

            $mergedClasses = self::merge($existingClasses, $newClasses);

            $attributes['class'] = implode(' ', $mergedClasses);

            return;
        }

        $classArray = is_array($class)
            ? $class
            : preg_split('/\s+/', $class, flags: PREG_SPLIT_NO_EMPTY);

        $attributes['class'] = implode(' ', $classArray);
    }

    /**
     * Merges already existing CSS classes with new one.
     *
     * This method provides the priority for named existing classes over additional.
     *
     * @psalm-param string[] $existingClasses Already existing CSS classes.
     * @psalm-param string[] $additionalClasses CSS classes to be added.
     *
     * @return string[] merge result.
     */
    private static function merge(array $existingClasses, array $additionalClasses): array
    {
        foreach ($additionalClasses as $key => $class) {
            if (is_int($key) && !in_array($class, $existingClasses, true)) {
                $existingClasses[] = $class;
            } elseif (!isset($existingClasses[$key])) {
                $existingClasses[$key] = $class;
            }
        }

        return $existingClasses;
    }
}
