<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute;

use Closure;
use InvalidArgumentException;
use PHPForge\Html\Attribute\Enum\DataAttributes;

/**
 * Is used by widgets that implement the dataAttributes method.
 */
trait HasData
{
    protected bool|string $dataBsTarget = false;
    protected bool|string $dataDismissTarget = false;
    protected bool|string $dataDrawerTarget = false;
    protected bool|string $dataDropdownToggle = false;
    protected bool|string $dataToggle = false;

    /**
     * Set the data attribute.
     *
     * @param array $values The data attribute values.
     *
     * @return static A new instance of the current class with the specified data attribute values.
     *
     * @link https://html.spec.whatwg.org/multipage/dom.html#attr-data-*
     */
    public function dataAttributes(array $values): static
    {
        $new = clone $this;

        foreach ($values as $key => $value) {
            if (!is_string($key) || (!is_string($value) && !$value instanceof Closure)) {
                throw new InvalidArgumentException(
                    'The data attribute key must be a string and the value must be a string or a Closure.',
                );
            }


            $new->attributes["data-$key"] = $value;
        }

        return $new;
    }
}
