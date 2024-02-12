<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\TextArea;

use PHPForge\Html\TextArea;
use PHPForge\Support\Assert;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class CustomMethodTest extends TestCase
{
    public function testPrefix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            prefix
            <textarea id="textarea-659fc6087e75b"></textarea>
            HTML,
            TextArea::widget()->id('textarea-659fc6087e75b')->prefix('prefix')->render()
        );
    }

    public function testPrefixContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            prefix
            </div>
            <textarea id="textarea-659fc6087e75b"></textarea>
            HTML,
            TextArea::widget()->id('textarea-659fc6087e75b')->prefixContainer(true)->prefix('prefix')->render()
        );
    }

    public function testPrefixContainerAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="value">
            prefix
            </div>
            <textarea id="textarea-659fc6087e75b"></textarea>
            HTML,
            TextArea::widget()
                ->id('textarea-659fc6087e75b')
                ->prefixContainer(true)
                ->prefix('prefix')
                ->prefixContainerAttributes(['class' => 'value'])
                ->render()
        );
    }

    public function testPrefixContainerClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="value">
            prefix
            </div>
            <textarea id="textarea-659fc6087e75b"></textarea>
            HTML,
            TextArea::widget()
                ->id('textarea-659fc6087e75b')
                ->prefixContainer(true)
                ->prefix('prefix')
                ->prefixContainerClass('value')
                ->render()
        );
    }

    public function testPrefixContainerTag(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <span>prefix</span>
            <textarea id="textarea-659fc6087e75b"></textarea>
            HTML,
            TextArea::widget()
                ->id('textarea-659fc6087e75b')
                ->prefixContainer(true)
                ->prefix('prefix')
                ->prefixContainerTag('span')
                ->render()
        );
    }

    public function testRender(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <textarea id="textarea-659fc6087e75b"></textarea>
            HTML,
            TextArea::widget()->id('textarea-659fc6087e75b')->render()
        );
    }

    public function testSuffix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <textarea id="textarea-659fc6087e75b"></textarea>
            suffix
            HTML,
            TextArea::widget()->id('textarea-659fc6087e75b')->suffix('suffix')->render()
        );
    }

    public function testSuffixContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <textarea id="textarea-659fc6087e75b"></textarea>
            <div>
            suffix
            </div>
            HTML,
            TextArea::widget()->id('textarea-659fc6087e75b')->suffixContainer(true)->suffix('suffix')->render()
        );
    }

    public function testSuffixContainerAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <textarea id="textarea-659fc6087e75b"></textarea>
            <div class="value">
            suffix
            </div>
            HTML,
            TextArea::widget()
                ->id('textarea-659fc6087e75b')
                ->suffixContainer(true)
                ->suffix('suffix')
                ->suffixContainerAttributes(['class' => 'value'])
                ->render()
        );
    }

    public function testSuffixContainerClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <textarea id="textarea-659fc6087e75b"></textarea>
            <div class="value">
            suffix
            </div>
            HTML,
            TextArea::widget()
                ->id('textarea-659fc6087e75b')
                ->suffixContainer(true)
                ->suffix('suffix')
                ->suffixContainerClass('value')
                ->render()
        );
    }

    public function testSuffixContainerTag(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <textarea id="textarea-659fc6087e75b"></textarea>
            <span>suffix</span>
            HTML,
            TextArea::widget()
                ->id('textarea-659fc6087e75b')
                ->suffixContainer(true)
                ->suffix('suffix')
                ->suffixContainerTag('span')
                ->render()
        );
    }

    public function testTemplate(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <textarea id="textarea-659fc6087e75b"></textarea>
            </div>
            HTML,
            TextArea::widget()->id('textarea-659fc6087e75b')->template('<div>\n{tag}\n</div>')->render()
        );
    }
}
