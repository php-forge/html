<?php

declare(strict_types=1);

namespace PHPForge\Html\Base;

use InvalidArgumentException;
use PHPForge\Html\Attribute;

use function in_array;

/**
 * Provides a foundation for creating HTML `h1`, `h2`, `h3`, `h4`, `h5`, `h6` elements with various attributes and
 * content.
 */
abstract class AbstractH extends AbstractBlockElement
{
    use Attribute\Custom\HasTagName;

    protected string $tagName = 'h1';

    protected function beforeRun(): bool
    {
        if (in_array($this->tagName, ['h1', 'h2', 'h3', 'h4', 'h5', 'h6'], true) === false) {
            throw new InvalidArgumentException('Invalid tag name, only h1 to h6 are allowed.');
        }

        return parent::beforeRun();
    }
}
