<?php

declare(strict_types=1);

namespace PHPForge\Html\Base;

use PHPForge\Html\Attribute;
use PHPForge\Html\HtmlBuilder;

/**
 * This is an abstract class that extends AbstractWidget and serves as a base for form elements like Label.
 * Concrete classes should extend this class to implement specific form elements and their generation logic.
 */
abstract class AbstractLabel extends AbstractBlockElement
{
    use Attribute\Input\HasForm;
    use Attribute\Tag\HasFor;

    protected string $tagName = 'label';

    protected function run(): string
    {
        return HtmlBuilder::create('label', $this->content, $this->attributes);
    }
}
