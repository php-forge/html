<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Svg;

use PHPForge\Html\Svg;
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

    public function testViewBoxWithHeightWidth(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 640 512"><path d="M320 104.5c171.4 0 303.2 72.2 303.2 151.5S491.3 407.5 320 407.5c-171.4 0-303.2-72.2-303.2-151.5S148.7 104.5 320 104.5m0-16.8C143.3 87.7 0 163 0 256s143.3 168.3 320 168.3S640 349 640 256 496.7 87.7 320 87.7zM218.2 242.5c-7.9 40.5-35.8 36.3-70.1 36.3l13.7-70.6c38 0 63.8-4.1 56.4 34.3zM97.4 350.3h36.7l8.7-44.8c41.1 0 66.6 3 90.2-19.1 26.1-24 32.9-66.7 14.3-88.1-9.7-11.2-25.3-16.7-46.5-16.7h-70.7L97.4 350.3zm185.7-213.6h36.5l-8.7 44.8c31.5 0 60.7-2.3 74.8 10.7 14.8 13.6 7.7 31-8.3 113.1h-37c15.4-79.4 18.3-86 12.7-92-5.4-5.8-17.7-4.6-47.4-4.6l-18.8 96.6h-36.5l32.7-168.6zM505 242.5c-8 41.1-36.7 36.3-70.1 36.3l13.7-70.6c38.2 0 63.8-4.1 56.4 34.3zM384.2 350.3H421l8.7-44.8c43.2 0 67.1 2.5 90.2-19.1 26.1-24 32.9-66.7 14.3-88.1-9.7-11.2-25.3-16.7-46.5-16.7H417l-32.8 168.7z"/></svg>
            HTML,
            Svg::widget()->filePath(__DIR__ . '/Stub/php.svg')->render()
        );

        Assert::equalsWithoutLE(
            <<<HTML
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" height="32" width="32"><path d="M320 104.5c171.4 0 303.2 72.2 303.2 151.5S491.3 407.5 320 407.5c-171.4 0-303.2-72.2-303.2-151.5S148.7 104.5 320 104.5m0-16.8C143.3 87.7 0 163 0 256s143.3 168.3 320 168.3S640 349 640 256 496.7 87.7 320 87.7zM218.2 242.5c-7.9 40.5-35.8 36.3-70.1 36.3l13.7-70.6c38 0 63.8-4.1 56.4 34.3zM97.4 350.3h36.7l8.7-44.8c41.1 0 66.6 3 90.2-19.1 26.1-24 32.9-66.7 14.3-88.1-9.7-11.2-25.3-16.7-46.5-16.7h-70.7L97.4 350.3zm185.7-213.6h36.5l-8.7 44.8c31.5 0 60.7-2.3 74.8 10.7 14.8 13.6 7.7 31-8.3 113.1h-37c15.4-79.4 18.3-86 12.7-92-5.4-5.8-17.7-4.6-47.4-4.6l-18.8 96.6h-36.5l32.7-168.6zM505 242.5c-8 41.1-36.7 36.3-70.1 36.3l13.7-70.6c38.2 0 63.8-4.1 56.4 34.3zM384.2 350.3H421l8.7-44.8c43.2 0 67.1 2.5 90.2-19.1 26.1-24 32.9-66.7 14.3-88.1-9.7-11.2-25.3-16.7-46.5-16.7H417l-32.8 168.7z"/></svg>
            HTML,
            Svg::widget()->filePath(__DIR__ . '/Stub/php.svg')->height(32)->width(32)->render()
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
