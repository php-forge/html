<?php

declare(strict_types=1);

namespace PHPForge\Html\Input\Base;

use InvalidArgumentException;
use PHPForge\Html\Helper\Encode;

use function array_key_exists;
use function is_string;

abstract class AbstractHidden extends AbstractInput
{
    /**
     * @var array<string>
     */
    protected const NOT_ALLOWED_ATTRIBUTES = [
        'aria-describedby',
        'aria-label',
        'autofocus',
        'disabled',
        'hidden',
        'required',
        'readonly',
        'tabindex',
        'title',
    ];
    protected string $type = 'hidden';

    protected function run(): string
    {
        $attributes = $this->attributes;
        $value = $attributes['value'] ?? null;

        foreach (static::NOT_ALLOWED_ATTRIBUTES as $attribute) {
            if (array_key_exists($attribute, $attributes)) {
                throw new InvalidArgumentException(
                    sprintf('%s::class widget must not be "%s" attribute.', static::class, Encode::content($attribute))
                );
            }
        }

        /**
         * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.hidden.html#input.hidden.attrs.value
         */
        if ($value !== null && is_string($value) === false) {
            throw new InvalidArgumentException(
                sprintf('%s::class widget must be a string or null value.', static::class)
            );
        }

        return parent::run();
    }
}
