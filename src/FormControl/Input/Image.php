<?php

declare(strict_types=1);

namespace PHPForge\Html\FormControl\Input;

use PHPForge\{
    Html\Attribute\Input\HasAlt,
    Html\Attribute\Input\HasFormaction,
    Html\Attribute\Input\HasFormenctype,
    Html\Attribute\Input\HasFormmethod,
    Html\Attribute\Input\HasFormnovalidate,
    Html\Attribute\Input\HasFormtarget,
    Html\Attribute\Input\HasHeight,
    Html\Attribute\Input\HasSrc,
    Html\Attribute\Input\HasValue,
    Html\Attribute\Input\HasWidth,
    Html\FormControl\Input\Base\AbstractInput,
    Html\Interop\SrcInterface
};

/**
 * The input element with a type attribute whose value is "image" represents either an image from which the UA enables a
 * user to interactively select a pair of coordinates and submit the form, or alternatively a button from which the user
 * can submit the form.
 *
 * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.image.html#input.image
 */
final class Image extends AbstractInput implements SrcInterface
{
    use HasAlt;
    use HasFormaction;
    use HasFormenctype;
    use HasFormmethod;
    use HasFormnovalidate;
    use HasFormtarget;
    use HasHeight;
    use HasSrc;
    use HasValue;
    use HasWidth;

    protected function run(): string
    {
        // The value attribute is not allowed for the input type `image`.
        unset($this->attributes['value']);

        return $this->buildInputTag($this->attributes, 'image');
    }
}
