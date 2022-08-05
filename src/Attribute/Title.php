<?php

declare(strict_types=1);

namespace Forge\Html\Attribute;

trait Title
{
    /**
     * Returns a new instance with the specified the title global attribute contains text representing advisory
     * information related to the element it belongs to.
     *
     * @param string $value The title of the widget.
     *
     * @return static
     *
     * @link https://html.spec.whatwg.org/multipage/dom.html#attr-title
     */
    public function title(string $value): static
    {
        $new = clone $this;
        $new->attributes['title'] = $value;

        return $new;
    }
}
