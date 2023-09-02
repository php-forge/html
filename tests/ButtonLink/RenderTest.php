<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\ButtonLink;

use PHPForge\Html\Attribute\Enum\DataAttributes;
use PHPForge\Html\ButtonLink;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class RenderTest extends TestCase
{
    public function testAttributes(): void
    {
        $this->assertSame(
            '<a class="test-class" href="https://example.com" role="button"></a>',
            ButtonLink::widget()->attributes(['class' => 'test-class'])->href('https://example.com')->render(),
        );
    }

    public function testClass(): void
    {
        $this->assertSame(
            '<a class="test-class" href="https://example.com" role="button"></a>',
            ButtonLink::widget()->class('test-class')->href('https://example.com')->render(),
        );
    }

    public function testContent(): void
    {
        $this->assertSame('<a role="button">content</a>', ButtonLink::widget()->content('content')->render());
    }

    public function testDataAttributes(): void
    {
        $this->assertSame(
            '<a href="https://example.com" role="button" data-collapse-toggle="id"></a>',
            ButtonLink::widget()
                ->dataAttributes([DataAttributes::DATA_COLLAPSE_TOGGLE => 'id'])
                ->href('https://example.com')
                ->render(),
        );
    }

    public function testDisabled(): void
    {
        $this->assertSame(
            '<a class="disabled" href="https://example.com" role="button" aria-disabled="true"></a>',
            ButtonLink::widget()->disabled()->href('https://example.com')->render(),
        );
    }

    public function testElement(): void
    {
        $this->assertSame(
            '<a href="https://example.com" role="button"></a>',
            ButtonLink::widget()->href('https://example.com')->render(),
        );
    }

    public function testId(): void
    {
        $this->assertSame(
            '<a id="test-id" href="https://example.com" role="button"></a>',
            ButtonLink::widget()->href('https://example.com')->id('test-id')->render(),
        );
    }

    public function testName(): void
    {
        $this->assertSame(
            '<a name="test-name" href="https://example.com" role="button"></a>',
            ButtonLink::widget()->href('https://example.com')->name('test-name')->render(),
        );
    }

    public function testStyle(): void
    {
        $this->assertSame(
            '<a href="https://example.com" role="button" style="color:red;"></a>',
            ButtonLink::widget()->href('https://example.com')->style('color:red;')->render(),
        );
    }

    public function testTitle(): void
    {
        $this->assertSame(
            '<a href="https://example.com" title="test-title" role="button"></a>',
            ButtonLink::widget()->href('https://example.com')->title('test-title')->render(),
        );
    }

    public function testWithoutId(): void
    {
        $this->assertSame(
            '<a href="https://example.com" role="button"></a>',
            ButtonLink::widget()->href('https://example.com')->id(null)->render(),
        );
    }

    public function testWithoutName(): void
    {
        $this->assertSame(
            '<a href="https://example.com" role="button"></a>',
            ButtonLink::widget()->href('https://example.com')->name(null)->render(),
        );
    }
}
