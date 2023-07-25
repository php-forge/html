<?php

declare(strict_types=1);

namespace PHPForge\Html\Base;

use PHPForge\Html\Attribute;

/**
 * This is an abstract class that extends AbstractElemnt and serves as a base for generating various HTML tags.
 * Concrete classes should extend this class to implement specific HTML tags and their generation logic.
 */
abstract class AbstractTag extends AbstractBlockElement
{
    use Attribute\Custom\HasTagName;
}
