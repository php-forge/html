<?php

declare(strict_types=1);

namespace PHPForge\Html\Input;

use PHPForge\Html\Attribute;

/**
 * The input element with a type attribute whose value is "image" represents either an image from which the UA enables a
 * user to interactively select a pair of coordinates and submit the form, or alternatively a button from which the user
 * can submit the form.
 *
 * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.image.html#input.image
 */
final class Image extends Base\AbstractInput
{
    use Attribute\Custom\HasWidgetValidation;
    use Attribute\Input\HasAlt;
    use Attribute\Input\HasFormaction;
    use Attribute\Input\HasFormenctype;
    use Attribute\Input\HasFormmethod;
    use Attribute\Input\HasFormnovalidate;
    use Attribute\Input\HasFormtarget;
    use Attribute\Input\HasHeight;
    use Attribute\Input\HasSrc;
    use Attribute\Input\HasWidth;

    protected function run(): string
    {
        $attributes = $this->attributes;
        $value = $attributes['src'] ?? $this->getValue();
        $this->validateString($value);

        unset($attributes['value']);

        $attributes['src'] = $value;

        return $this->buildInputTag($attributes, 'image');
    }
}
