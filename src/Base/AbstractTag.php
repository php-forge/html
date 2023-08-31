<?php

declare(strict_types=1);

namespace PHPForge\Html\Base;

use PHPForge\Html\Attribute;

/**
 * Provides a foundation for creating HTML `tag` custom elements with various attributes and content.
 */
abstract class AbstractTag extends AbstractBlockElement
{
    use Attribute\Custom\HasTagName;
}
