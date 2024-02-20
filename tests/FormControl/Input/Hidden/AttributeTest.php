<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Input\Hidden;

use PHPForge\Html\FormControl\Input\Hidden;
use PHPForge\Support\Assert;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class AttributeTest extends TestCase
{
    public function testAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input class="value" id="hidden-6582f2d099e8b" type="hidden">
            HTML,
            Hidden::widget()->attributes(['class' => 'value'])->id('hidden-6582f2d099e8b')->render()
        );
    }

    public function testClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input class="value" id="hidden-6582f2d099e8b" type="hidden">
            HTML,
            Hidden::widget()->class('value')->id('hidden-6582f2d099e8b')->render()
        );
    }

    public function testGenerateId(): void
    {
        $this->assertStringContainsString('id="hidden-', Hidden::widget()->render());
    }

    public function testGetValue(): void
    {
        $this->assertSame('value', Hidden::widget()->value('value')->getValue());
    }

    public function testId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="value" type="hidden">
            HTML,
            Hidden::widget()->id('value')->render()
        );
    }

    public function testName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="hidden-6582f2d099e8b" name="value" type="hidden">
            HTML,
            Hidden::widget()->id('hidden-6582f2d099e8b')->name('value')->render()
        );
    }

    public function testStyle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="hidden-6582f2d099e8b" type="hidden" style="value">
            HTML,
            Hidden::widget()->id('hidden-6582f2d099e8b')->style('value')->render()
        );
    }

    public function testValue(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="hidden-6582f2d099e8b" type="hidden" value="value">
            HTML,
            Hidden::widget()->id('hidden-6582f2d099e8b')->value('value')->render()
        );
    }

    public function testValueEmpty(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="hidden-6582f2d099e8b" type="hidden">
            HTML,
            Hidden::widget()->id('hidden-6582f2d099e8b')->value(null)->render()
        );
    }

    public function testWithoutId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input type="hidden">
            HTML,
            Hidden::widget()->id(null)->render()
        );
    }

    public function testWithoutName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <input id="hidden-6582f2d099e8b" type="hidden">
            HTML,
            Hidden::widget()->id('hidden-6582f2d099e8b')->name(null)->render()
        );
    }
}
