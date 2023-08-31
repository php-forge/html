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
     * is an array, and some class placed there with the named (string) key, overriding of such key will have no
     * effect. For example:
     *
     * ```php
     * $attributes = ['class' => ['persistent' => 'initial']];
     *
     * // ['class' => ['persistent' => 'initial']];
     * $cssClass = new CssClass();
     * $cssClass->add($attributes, ['persistent' => 'override']);
     * ```
     *
     * {@see removeCssClass()}
     *
     * @param array $attributes The attributes to be modified.
     * @param string|string[] $class The CSS class(es) to be added.
     */
    public static function add(array &$attributes, array|string $class): void
    {
        if (isset($attributes['class'])) {
            if (is_array($attributes['class'])) {
                /** @psalm-var string[] $attributes['class'] */
                $attributes['class'] = self::merge($attributes['class'], (array) $class);
            } elseif ('' !== $class) {
                /** @psalm-var string $attributes['class'] */
                $classes = preg_split('/\s+/', $attributes['class'], -1, PREG_SPLIT_NO_EMPTY);
                $attributes['class'] = implode(' ', self::merge($classes, (array) $class));
            }
        } elseif ($class !== [] && $class !== '') {
            $attributes['class'] = $class;
        }
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
