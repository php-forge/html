<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Head;

use PHPForge\Html\Head;
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
            <head class="test-class">
            </head>
            HTML,
            Head::widget()->attributes(['class' => 'test-class'])->render(),
        );
    }

    public function testClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <head class="test-class">
            </head>
            HTML,
            Head::widget()->class('test-class')->render(),
        );
    }

    public function testBlockLevelElements(): void
    {
        $this->assertSame('<head>test block</head>', Head::widget()->begin() . 'test block' . Head::end());
    }

    public function testElement(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <head>
            test element
            </head>
            HTML,
            Head::widget()->content('test element')->render(),
        );
    }

    public function testId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <head id="test-id">
            </head>
            HTML,
            Head::widget()->id('test-id')->render(),
        );
    }

    public function testLang(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <head lang="en">
            </head>
            HTML,
            Head::widget()->lang('en')->render(),
        );
    }

    public function testName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <head name="test-name">
            </head>
            HTML,
            Head::widget()->name('test-name')->render(),
        );
    }

    public function testStyle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <head style="color: red;">
            </head>
            HTML,
            Head::widget()->style('color: red;')->render(),
        );
    }

    public function testTitle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <head title="test-title">
            </head>
            HTML,
            Head::widget()->title('test-title')->render(),
        );
    }

    public function testWithoutId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <head>
            </head>
            HTML,
            Head::widget()->id(null)->render(),
        );
    }

    public function testWithoutName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <head>
            </head>
            HTML,
            Head::widget()->name(null)->render(),
        );
    }
}
