<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Button;

use PHPForge\Html\Attribute\Enum\DataAttributes;
use PHPForge\Html\Button;
use PHPForge\Html\Span;
use PHPForge\Support\Assert;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class RenderTest extends TestCase
{
    public function testAriaControls(): void
    {
        $this->assertSame(
            '<button type="button" aria-controls="id"></button>',
            Button::widget()->ariaControls('id')->render(),
        );
    }

    public function testAriaDisabled(): void
    {
        $this->assertSame(
            '<button type="button" aria-disabled="true"></button>',
            Button::widget()->ariaDisabled('true')->render(),
        );
    }

    public function testAriaExpanded(): void
    {
        $this->assertSame(
            '<button type="button" aria-expanded="true"></button>',
            Button::widget()->ariaExpanded('true')->render(),
        );
    }

    public function testAttributes(): void
    {
        $this->assertSame(
            '<button class="test-class" type="button"></button>',
            Button::widget()->attributes(['class' => 'test-class'])->render(),
        );
    }

    public function testClass(): void
    {
        $this->assertSame(
            '<button class="test-class" type="button"></button>',
            Button::widget()->class('test-class')->render(),
        );
    }

    public function testContainer(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            <button type="button"></button>
            </div>
            HTML,
            Button::widget()->container(true)->render(),
        );
    }

    public function testContent(): void
    {
        $this->assertSame('<button type="button">content</button>', Button::widget()->content('content')->render());
    }

    public function testContentWithTag(): void
    {
        $this->assertSame(
            '<button type="button">Page: <span>2</span> of <span>5</span></button>',
            Button::widget()->content(
                'Page: ',
                Span::widget()->content('2'),
                " of ",
                Span::widget()->content('5'),
            )->render(),
        );
    }

    public function testDataAttributes(): void
    {
        $this->assertSame(
            '<button type="button" data-drawer-target="id"></button>',
            Button::widget()->dataAttributes([DataAttributes::DATA_DRAWER_TARGET->value => 'id'])->render(),
        );
    }

    public function testId(): void
    {
        $this->assertSame(
            '<button id="test-id" type="button"></button>',
            Button::widget()->id('test-id')->render(),
        );
    }

    public function testElement(): void
    {
        $this->assertSame('<button type="button"></button>', Button::widget()->render());
    }

    public function testName(): void
    {
        $this->assertSame(
            '<button name="test" type="button"></button>',
            Button::widget()->name('test')->render(),
        );
    }

    public function testRole(): void
    {
        $this->assertSame(
            '<button type="button" role="test"></button>',
            Button::widget()->role('test')->render(),
        );
    }

    public function testStyle(): void
    {
        $this->assertSame(
            '<button type="button" style="color:red;"></button>',
            Button::widget()->style('color:red;')->render(),
        );
    }

    public function testTabIndex(): void
    {
        $this->assertSame(
            '<button type="button" tabindex="1"></button>',
            Button::widget()->tabIndex(1)->render(),
        );
    }

    public function testTagName(): void
    {
        $this->assertSame(
            '<a></a>',
            Button::widget()->tagName('a')->type('link')->render(),
        );
    }

    public function testTitle(): void
    {
        $this->assertSame(
            '<button type="button" title="test"></button>',
            Button::widget()->title('test')->render(),
        );
    }

    public function testType(): void
    {
        $this->assertSame(
            '<button type="submit"></button>',
            Button::widget()->type('submit')->render(),
        );
    }
}
