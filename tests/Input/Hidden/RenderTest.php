<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Input\Hidden;

use PHPForge\Html\Input\Hidden;
use PHPForge\Support\Assert;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class RenderTest extends TestCase
{
    public function testAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input class="class" id="text-6582f2d099e8b" type="hidden">
            HTML,
            Hidden::widget()->attributes(['class' => 'class'])->id('text-6582f2d099e8b')->render()
        );
    }

    public function testClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input class="class" id="text-6582f2d099e8b" type="hidden">
            HTML,
            Hidden::widget()->class('class')->id('text-6582f2d099e8b')->render()
        );
    }

    public function testDataAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="text-6582f2d099e8b" type="hidden" data-test="data-value">
            HTML,
            Hidden::widget()->dataAttributes(['test' => 'data-value'])->id('text-6582f2d099e8b')->render()
        );
    }

    public function testForm(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="text-6582f2d099e8b" type="hidden" form="form">
            HTML,
            Hidden::widget()->form('form')->id('text-6582f2d099e8b')->render()
        );
    }

    public function testId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="id" type="hidden">
            HTML,
            Hidden::widget()->id('id')->render()
        );
    }

    public function testLang(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="text-6582f2d099e8b" type="hidden" lang="en">
            HTML,
            Hidden::widget()->id('text-6582f2d099e8b')->lang('en')->render()
        );
    }

    public function testName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="text-6582f2d099e8b" name="name" type="hidden">
            HTML,
            Hidden::widget()->id('text-6582f2d099e8b')->name('name')->render()
        );
    }

    public function testPrefix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            prefix
            <input id="text-6582f2d099e8b" type="hidden">
            HTML,
            Hidden::widget()->id('text-6582f2d099e8b')->prefix('prefix')->render()
        );
    }

    public function testPrefixContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            prefix
            </div>
            <input id="text-6582f2d099e8b" type="hidden">
            HTML,
            Hidden::widget()->id('text-6582f2d099e8b')->prefix('prefix')->prefixContainer(true)->render()
        );
    }

    public function testPrefixContainerAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="class">
            prefix
            </div>
            <input id="text-6582f2d099e8b" type="hidden">
            HTML,
            Hidden::widget()
                ->id('text-6582f2d099e8b')
                ->prefix('prefix')
                ->prefixContainer(true)
                ->prefixContainerAttributes(['class' => 'class'])
                ->render()
        );
    }

    public function testPrefixContainerClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div class="class">
            prefix
            </div>
            <input id="text-6582f2d099e8b" type="hidden">
            HTML,
            Hidden::widget()
                ->id('text-6582f2d099e8b')
                ->prefix('prefix')
                ->prefixContainer(true)
                ->prefixContainerClass('class')
                ->render()
        );
    }

    public function testPrefixContainerTag(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <article>
            prefix
            </article>
            <input id="text-6582f2d099e8b" type="hidden">
            HTML,
            Hidden::widget()
                ->id('text-6582f2d099e8b')
                ->prefix('prefix')
                ->prefixContainer(true)
                ->prefixContainerTag('article')
                ->render()
        );
    }

    public function testRender(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="text-6582f2d099e8b" type="hidden">
            HTML,
            Hidden::widget()->id('text-6582f2d099e8b')->render()
        );
    }

    public function testStyle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="text-6582f2d099e8b" type="hidden" style="style">
            HTML,
            Hidden::widget()->id('text-6582f2d099e8b')->style('style')->render()
        );
    }

    public function testSuffix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="text-6582f2d099e8b" type="hidden">
            suffix
            HTML,
            Hidden::widget()->id('text-6582f2d099e8b')->suffix('suffix')->render()
        );
    }

    public function testSuffixContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="text-6582f2d099e8b" type="hidden">
            <div>
            suffix
            </div>
            HTML,
            Hidden::widget()->id('text-6582f2d099e8b')->suffix('suffix')->suffixContainer(true)->render()
        );
    }

    public function testSuffixContainerAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="text-6582f2d099e8b" type="hidden">
            <div class="class">
            suffix
            </div>
            HTML,
            Hidden::widget()
                ->id('text-6582f2d099e8b')
                ->suffix('suffix')
                ->suffixContainer(true)
                ->suffixContainerAttributes(['class' => 'class'])
                ->render()
        );
    }

    public function testSuffixContainerClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="text-6582f2d099e8b" type="hidden">
            <div class="class">
            suffix
            </div>
            HTML,
            Hidden::widget()
                ->id('text-6582f2d099e8b')
                ->suffix('suffix')
                ->suffixContainer(true)
                ->suffixContainerClass('class')
                ->render()
        );
    }

    public function testSuffixContainerTag(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="text-6582f2d099e8b" type="hidden">
            <article>
            suffix
            </article>
            HTML,
            Hidden::widget()
                ->id('text-6582f2d099e8b')
                ->suffix('suffix')
                ->suffixContainer(true)
                ->suffixContainerTag('article')
                ->render()
        );
    }

    public function testTemplate(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="text-6582f2d099e8b" type="hidden">
            suffix
            HTML,
            Hidden::widget()
                ->id('text-6582f2d099e8b')
                ->prefix('prefix')
                ->suffix('suffix')
                ->template('{tag}{suffix}')
                ->render()
        );
    }

    public function testValue(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="text-6582f2d099e8b" type="hidden" value="value">
            HTML,
            Hidden::widget()->id('text-6582f2d099e8b')->value('value')->render()
        );
    }

    public function testValueEmpty(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="text-6582f2d099e8b" type="hidden">
            HTML,
            Hidden::widget()->id('text-6582f2d099e8b')->value(null)->render()
        );
    }
}
