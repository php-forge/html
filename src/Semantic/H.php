<?php

declare(strict_types=1);

namespace PHPForge\Html\Semantic;

use PHPForge\Html\{
    Attribute\Custom\HasTagName,
    Attribute\Custom\HasWidgetValidation,
    Base\AbstractBlockElement
};

/**
 * The `<h1>` to `<h6>` HTML elements represent six levels of section headings.
 * `<h1>` is the highest section level and `<h6>` is the lowest.
 *
 * @link https://html.spec.whatwg.org/multipage/sections.html#the-h1,-h2,-h3,-h4,-h5,-and-h6-elements
 */
final class H extends AbstractBlockElement
{
    use HasTagName;
    use HasWidgetValidation;

    /**
     * This method is used to configure the widget with the provided default definitions.
     */
    protected function loadDefaultDefinitions(): array
    {
        return [
            'tagName()' => ['h1'],
        ];
    }

    protected function run(): string
    {
        $this->validateTagName($this->tagName, 'h1', 'h2', 'h3', 'h4', 'h5', 'h6');

        return parent::run();
    }
}
