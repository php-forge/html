<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Title;

use PHPForge\Html\Layout\Title;
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
            <title class="value">
            </title>
            HTML,
            Title::widget()->attributes(['class' => 'value'])->render()
        );
    }

    public function testClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <title class="value">
            </title>
            HTML,
            Title::widget()->class('value')->render()
        );
    }

    public function testContent(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <title>
            value
            </title>
            HTML,
            Title::widget()->content('value')->render()
        );
    }

    public function testDataAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <title data-value="value">
            </title>
            HTML,
            Title::widget()->dataAttributes(['value' => 'value'])->render()
        );
    }

    public function testId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <title id="value">
            </title>
            HTML,
            Title::widget()->id('value')->render()
        );
    }

    public function testLang(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <title lang="value">
            </title>
            HTML,
            Title::widget()->lang('value')->render()
        );
    }

    public function testName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <title name="value">
            </title>
            HTML,
            Title::widget()->name('value')->render()
        );
    }

    public function testStyle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <title style="value">
            </title>
            HTML,
            Title::widget()->style('value')->render()
        );
    }

    public function testTitle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <title title="value">
            </title>
            HTML,
            Title::widget()->title('value')->render()
        );
    }
}
