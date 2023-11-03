<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Input;

use InvalidArgumentException;

use function implode;
use function in_array;
use function sprintf;

/**
 * Is used by widgets that implement the formtarget method.
 */
trait HasFormtarget
{
    /**
     * Specifies a browsing context name or keyword that represents the target of the control.
     *
     * @param string $value The browsing context name or keyword.
     *
     * @throws InvalidArgumentException If the provided formtarget value is not one of the following values:
     * "_blank", "_self", "_parent" or "_top".
     *
     * @return static A new instance of the current class with the specified formtarget value.
     */
    public function formtarget(string $value): static
    {
        $allowedValues = ['_blank', '_self', '_parent', '_top'];

        if (in_array($value, $allowedValues, true) === false) {
            throw new InvalidArgumentException(
                sprintf(
                    'The formtarget attribute value must be one of "%s"',
                    implode('", "', $allowedValues)
                )
            );
        }

        $new = clone $this;
        $new->attributes['formtarget'] = $value;

        return $new;
    }
}
