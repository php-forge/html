<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\ButtonLink;

use PHPForge\Html\Attribute\Enum\DataAttributes;
use PHPForge\Html\ButtonLink;
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
            <a class="class" type="button" role="button"></a>
            HTML,
            ButtonLink::widget()->attributes(['class' => 'class'])->render()
        );
    }

    public function testClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a class="class" type="button" role="button"></a>
            HTML,
            ButtonLink::widget()->class('class')->render()
        );
    }

    public function testContent(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a type="button" role="button">content</a>
            HTML,
            ButtonLink::widget()->content('content')->render()
        );
    }

    public function testDataAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a type="button" role="button" data-collapse-toggle="id"></a>
            HTML,
            ButtonLink::widget()->dataAttributes([DataAttributes::COLLAPSE_TOGGLE => 'id'])->render()
        );
    }

    public function testDisabled(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a class="disabled" type="button" role="button" aria-disabled="true"></a>
            HTML,
            ButtonLink::widget()->disabled()->render()
        );
    }

    public function testElement(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a type="button" role="button"></a>
            HTML,
            ButtonLink::widget()->render()
        );
    }

    public function testId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a id="id" type="button" role="button"></a>
            HTML,
            ButtonLink::widget()->id('id')->render()
        );
    }

    public function testName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a name="name" type="button" role="button"></a>
            HTML,
            ButtonLink::widget()->name('name')->render()
        );
    }

    public function testRole(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a type="button" role="button-link-role"></a>
            HTML,
            ButtonLink::widget()->role('button-link-role')->render(),
        );
    }

    public function testRoleWithAttribute(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a type="button" role="button-link-role"></a>
            HTML,
            ButtonLink::widget()->attributes(['role' => 'button-link-role'])->render()
        );
    }

    public function testStyle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a type="button" role="button" style="style"></a>
            HTML,
            ButtonLink::widget()->style('style')->render()
        );
    }

    public function testTitle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a type="button" title="title" role="button"></a>
            HTML,
            ButtonLink::widget()->title('title')->render()
        );
    }

    public function testWithoutId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a type="button" role="button"></a>
            HTML,
            ButtonLink::widget()->id(null)->render()
        );
    }

    public function testWithoutName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a type="button" role="button"></a>
            HTML,
            ButtonLink::widget()->name(null)->render()
        );
    }
}
