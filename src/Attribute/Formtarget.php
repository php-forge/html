<?php

declare(strict_types=1);

namespace Forge\Html\Attribute;

use InvalidArgumentException;

trait Formtarget
{
    /**
     * Returns a new instances specifies a browsing context name or keyword that represents the target of the control.
     *
     * @param string $value The browsing context name or keyword.
     *
     * @return self
     */
    public function formtarget(string $value): self
    {
        if ($value !== '_blank' && $value !== '_self' && $value !== '_parent' && $value !== '_top') {
            throw new InvalidArgumentException(
                'The formtarget attribute value must be one of "_blank", "_self", "_parent" or "_top"'
            );
        }

        $new = clone $this;
        $new->attributes['formtarget'] = $value;

        return $new;
    }
}
