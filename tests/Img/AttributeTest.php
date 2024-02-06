<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Img;

use PHPForge\Html\Img;
use PHPForge\Support\Assert;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class AttributeTest extends TestCase
{
    public function testAlt(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <img alt="value">
            HTML,
            Img::widget()->alt('value')->render()
        );
    }

    public function testAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <img class="value">
            HTML,
            Img::widget()->attributes(['class' => 'value'])->render()
        );
    }

    public function testClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <img class="value">
            HTML,
            Img::widget()->class('value')->render()
        );
    }

    public function testCrossOrigin(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <img crossorigin="anonymous">
            HTML,
            Img::widget()->crossOrigin('anonymous')->render()
        );
    }

    public function testDataAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <img data-value="value">
            HTML,
            Img::widget()->dataAttributes(['value' => 'value'])->render()
        );
    }

    public function testHeight(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <img height="1">
            HTML,
            Img::widget()->height(1)->render()
        );
    }

    public function testId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <img id="value">
            HTML,
            Img::widget()->id('value')->render()
        );
    }

    public function testIsMap(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <img ismap>
            HTML,
            Img::widget()->isMap()->render()
        );
    }

    public function testLang(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <img lang="value">
            HTML,
            Img::widget()->lang('value')->render()
        );
    }

    public function testLoading(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <img loading="lazy">
            HTML,
            Img::widget()->loading('lazy')->render()
        );
    }

    public function testName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <img name="value">
            HTML,
            Img::widget()->name('value')->render()
        );
    }

    public function testSizes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <img sizes="value">
            HTML,
            Img::widget()->sizes('value')->render()
        );
    }

    public function testSrc(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <img src="value">
            HTML,
            Img::widget()->src('value')->render()
        );
    }

    public function testSrcSet(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <img srcset="value">
            HTML,
            Img::widget()->srcSet('value')->render()
        );
    }

    public function testStyle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <img style="value">
            HTML,
            Img::widget()->style('value')->render()
        );
    }

    public function testTitle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <img title="value">
            HTML,
            Img::widget()->title('value')->render()
        );
    }

    public function testWidth(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <img width="1">
            HTML,
            Img::widget()->width(1)->render()
        );
    }
}
