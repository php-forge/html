<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Head;

use PHPForge\Html\Head;
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
            <head class="value">
            </head>
            HTML,
            Head::widget()->attributes(['class' => 'value'])->render(),
        );
    }

    public function testClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <head class="value">
            </head>
            HTML,
            Head::widget()->class('value')->render(),
        );
    }

    public function testContent(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <head>
            test content
            </head>
            HTML,
            Head::widget()->content('test content')->render(),
        );
    }

    public function testDataAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <head data-value="value">
            </head>
            HTML,
            Head::widget()->dataAttributes(['value' => 'value'])->render(),
        );
    }

    public function testId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <head id="value">
            </head>
            HTML,
            Head::widget()->id('value')->render(),
        );
    }

    public function testLang(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <head lang="value">
            </head>
            HTML,
            Head::widget()->lang('value')->render(),
        );
    }

    public function testName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <head name="value">
            </head>
            HTML,
            Head::widget()->name('value')->render(),
        );
    }

    public function testStyle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <head style="value">
            </head>
            HTML,
            Head::widget()->style('value')->render(),
        );
    }

    public function testTitle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <head title="value">
            </head>
            HTML,
            Head::widget()->title('value')->render(),
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
