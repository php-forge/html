<?php

declare(strict_types=1);

namespace PHPForge\Html\FormControl\Input;

use PHPForge\Html\{
    Attribute\FormControl\HasAlt,
    Attribute\FormControl\HasFormaction,
    Attribute\FormControl\HasFormenctype,
    Attribute\FormControl\HasFormmethod,
    Attribute\FormControl\HasFormnovalidate,
    Attribute\FormControl\HasFormtarget,
    Attribute\Input\HasHeight,
    Attribute\Input\HasSrc,
    Attribute\Input\HasValue,
    Attribute\Input\HasWidth,
    FormControl\Input\Base\AbstractInput,
    Interop\SrcInterface
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

    protected string $type = 'image';

    protected function run(): string
    {
        // The value attribute is not allowed for the input type `image`.
        unset($this->attributes['value']);

        return $this->renderInputTag($this->attributes);
    }
}
