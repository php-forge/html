<?php

declare(strict_types=1);

namespace PHPForge\Html\Base;

use PHPForge\Html\Attribute;

/**
 * Provides a foundation for creating HTML `label` elements with various attributes and content.
 */
abstract class AbstractLabel extends AbstractElement
{
    use Attribute\Input\HasForm;
    use Attribute\Tag\HasFor;

    protected string $tagName = 'label';
}
