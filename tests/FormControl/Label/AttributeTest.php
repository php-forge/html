<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Label;

use PHPForge\{Html\FormControl\Label, Support\Assert};
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
            <label class="value">value</label>
            HTML,
            Label::widget()->attributes(['class' => 'value'])->content('value')->render()
        );
    }

    public function testClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <label class="value">value</label>
            HTML,
            Label::widget()->class('value')->content('value')->render()
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
            <label data-value="value">value</label>
            HTML,
            Label::widget()->content('value')->dataAttributes(['value' => 'value'])->render()
        );
    }

    public function testLabelFor(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <label for="value">value</label>
            HTML,
            Label::widget()->content('value')->for('value')->render()
        );
    }

    public function testForm(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <label form="value">value</label>
            HTML,
            Label::widget()->content('value')->form('value')->render()
        );
    }

    public function testId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <label id="value">value</label>
            HTML,
            Label::widget()->content('value')->id('value')->render()
        );
    }

    public function testStyle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <label style="value">value</label>
            HTML,
            Label::widget()->content('value')->style('value')->render()
        );
    }

    public function testTitle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <label title="value">value</label>
            HTML,
            Label::widget()->content('value')->title('value')->render()
        );
    }
}
