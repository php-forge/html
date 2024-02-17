<?php

declare(strict_types=1);

namespace PHPForge\Html\Input;

use PHPForge\Html\Attribute\Custom\HasWidgetValidation;
use PHPForge\Html\Attribute\Input\{
    HasAlt,
    HasFormaction,
    HasFormenctype,
    HasFormmethod,
    HasFormnovalidate,
    HasFormtarget,
    HasHeight,
    HasSrc,
    HasValue,
    HasWidth
};
use PHPForge\Html\Input\Contract\SrcInterface;

/**
 * The input element with a type attribute whose value is "image" represents either an image from which the UA enables a
 * user to interactively select a pair of coordinates and submit the form, or alternatively a button from which the user
 * can submit the form.
 *
 * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.image.html#input.image
 */
final class Image extends Base\AbstractInput implements SrcInterface
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
    use HasWidgetValidation;
    use HasWidth;

    protected function run(): string
    {
        /** @var string|null $src */
        $src = $this->attributes['src'] ?? null;

        // The value attribute is not allowed for the input type `image`.
        unset($this->attributes['value']);

        return $this->buildInputTag($this->attributes, 'image');
    }
}
