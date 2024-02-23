<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Svg;

use PHPForge\{Html\Svg, Support\Assert};
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
            <svg class="value">
            value
            </svg>
            HTML,
            Svg::widget()->attributes(['class' => 'value'])->content('value')->render()
        );
    }

    public function testClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <svg class="value">
            value
            </svg>
            HTML,
            Svg::widget()->class('value')->content('value')->render()
        );
    }

    public function testContent(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <svg>
            value
            </svg>
            HTML,
            Svg::widget()->content('value')->render()
        );
    }

    public function testHeight(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <svg height="value">
            value
            </svg>
            HTML,
            Svg::widget()->content('value')->height('value')->render()
        );
    }

    public function testId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <svg id="value">
            value
            </svg>
            HTML,
            Svg::widget()->content('value')->id('value')->render()
        );
    }

    public function testLang(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <svg lang="value">
            value
            </svg>
            HTML,
            Svg::widget()->content('value')->lang('value')->render()
        );
    }

    public function testName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <svg name="value">
            value
            </svg>
            HTML,
            Svg::widget()->content('value')->name('value')->render()
        );
    }

    public function testStroke(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <svg stroke="value">
            value
            </svg>
            HTML,
            Svg::widget()->content('value')->stroke('value')->render()
        );
    }

    public function testTitle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <svg title="value">
            value
            </svg>
            HTML,
            Svg::widget()->content('value')->title('value')->render()
        );
    }

    public function testViewBox(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <svg viewBox="value">
            value
            </svg>
            HTML,
            Svg::widget()->content('value')->viewBox('value')->render()
        );
    }

    public function testWidth(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <svg width="1">
            value
            </svg>
            HTML,
            Svg::widget()->content('value')->width(1)->render()
        );
    }

    public function testXmlns(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <svg xmlns="value">
            value
            </svg>
            HTML,
            Svg::widget()->content('value')->xmlns('value')->render()
        );
    }
}
