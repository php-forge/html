<?php

declare(strict_types=1);

namespace PHPForge\Html\Base;

use PHPForge\Html\Attribute;

/**
 * Provides a foundation for creating HTML `textarea` elements with various attributes and content.
 */
abstract class AbstractTextArea extends AbstractElement
{
    use Attribute\Input\HasAutocomplete;
    use Attribute\Input\HasDirname;
    use Attribute\Input\HasMaxLength;
    use Attribute\Input\HasMinLength;
    use Attribute\Input\HasPlaceholder;
    use Attribute\Tag\HasCols;
    use Attribute\Tag\HasRows;
    use Attribute\Tag\HasWrap;
}
