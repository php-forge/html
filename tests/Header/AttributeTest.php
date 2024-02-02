<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Header;

use PHPForge\Html\Header;
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
            <header class="value">
            </header>
            HTML,
            Header::widget()->attributes(['class' => 'value'])->render(),
        );
    }

    public function testClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <header class="value">
            </header>
            HTML,
            Header::widget()->class('value')->render(),
        );
    }

    public function testContent(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <header>
            value
            </header>
            HTML,
            Header::widget()->content('value')->render(),
        );
    }

    public function testDataAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <header data-value="value">
            </header>
            HTML,
            Header::widget()->dataAttributes(['value' => 'value'])->render(),
        );
    }

    public function testId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <header id="value">
            </header>
            HTML,
            Header::widget()->id('value')->render(),
        );
    }

    public function testLang(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <header lang="en">
            </header>
            HTML,
            Header::widget()->lang('en')->render(),
        );
    }

    public function testName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <header name="value">
            </header>
            HTML,
            Header::widget()->name('value')->render(),
        );
    }

    public function testStyle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <header style="value">
            </header>
            HTML,
            Header::widget()->style('value')->render(),
        );
    }

    public function testTitle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <header title="value">
            </header>
            HTML,
            Header::widget()->title('value')->render(),
        );
    }

    public function testWithoutId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <header>
            </header>
            HTML,
            Header::widget()->id(null)->render(),
        );
    }

    public function testWithoutName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <header>
            </header>
            HTML,
            Header::widget()->name(null)->render(),
        );
    }
}
