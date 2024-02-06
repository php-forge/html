<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Label;

use PHPForge\Html\Label;
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
            <label class="value"></label>
            HTML,
            Label::widget()->attributes(['class' => 'value'])->render()
        );
    }

    public function testClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <label class="value"></label>
            HTML,
            Label::widget()->class('value')->render()
        );
    }

    public function testContent(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <label>Value</label>
            HTML,
            Label::widget()->content('Value')->render()
        );
    }

    public function testDataAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <label data-value="value"></label>
            HTML,
            Label::widget()->dataAttributes(['value' => 'value'])->render()
        );
    }

    public function testLabelFor(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <label for="value"></label>
            HTML,
            Label::widget()->for('value')->render()
        );
    }

    public function testForm(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <label form="value"></label>
            HTML,
            Label::widget()->form('value')->render()
        );
    }

    public function testId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <label id="value"></label>
            HTML,
            Label::widget()->id('value')->render()
        );
    }

    public function testName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <label name="value"></label>
            HTML,
            Label::widget()->name('value')->render()
        );
    }

    public function testStyle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <label style="value"></label>
            HTML,
            Label::widget()->style('value')->render()
        );
    }

    public function testTitle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <label title="value"></label>
            HTML,
            Label::widget()->title('value')->render()
        );
    }
}
