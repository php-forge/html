<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\A;

use PHPForge\Html\A;
use PHPForge\Html\Attribute\Enum\DataAttributes;
use PHPForge\Support\Assert;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class RenderTest extends TestCase
{
    public function testAriaDisabled(): void
    {
        $this->assertSame('<a aria-disabled="true"></a>', A::widget()->ariaDisabled('true')->render());
    }

    public function testAttributes(): void
    {
        $this->assertSame('<a class="test-class"></a>', A::widget()->attributes(['class' => 'test-class'])->render());
    }

    public function testAutofocus(): void
    {
        $this->assertSame('<a autofocus></a>', A::widget()->autofocus()->render());
    }

    public function testClass(): void
    {
        $this->assertSame('<a class="test-class"></a>', A::widget()->class('test-class')->render());
    }

    public function testContent(): void
    {
        $this->assertSame('<a>test-content</a>', A::widget()->content('test-content')->render());
    }

    public function testData(): void
    {
        $this->assertSame(
            '<a data-action="test-data"></a>',
            A::widget()->dataAttributes([DataAttributes::DATA_ACTION => 'test-data'])->render(),
        );
    }

    public function testDownload(): void
    {
        $this->assertSame('<a download></a>', A::widget()->download()->render());
    }

    public function testElement(): void
    {
        $this->assertSame('<a></a>', A::widget()->render());
    }

    public function testHidden(): void
    {
        $this->assertSame('<a hidden></a>', A::widget()->hidden()->render());
    }

    public function testHref(): void
    {
        $this->assertSame('<a href="test-href"></a>', A::widget()->href('test-href')->render());
    }

    public function testHreflang(): void
    {
        $this->assertSame('<a hreflang="test-hreflang"></a>', A::widget()->hreflang('test-hreflang')->render());
    }

    public function testId(): void
    {
        $this->assertSame('<a id="test-id"></a>', A::widget()->id('test-id')->render());
    }

    public function testLang(): void
    {
        $this->assertSame('<a lang="test-lang"></a>', A::widget()->lang('test-lang')->render());
    }

    public function testName(): void
    {
        $this->assertSame('<a name="test-name"></a>', A::widget()->name('test-name')->render());
    }

    public function testPing(): void
    {
        $this->assertSame('<a ping="test-ping"></a>', A::widget()->ping('test-ping')->render());
    }

    public function testPrefix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            test-prefix
            <a></a>
            HTML,
            A::widget()->prefix('test-prefix')->render(),
        );
    }

    public function testRel(): void
    {
        $this->assertSame('<a rel="tag"></a>', A::widget()->rel('tag')->render());
    }

    public function testReferrerpolicy(): void
    {
        $this->assertSame('<a referrerpolicy="no-referrer"></a>', A::widget()->referrerpolicy('no-referrer')->render());
    }

    public function testRole(): void
    {
        $this->assertSame('<a role="test-role"></a>', A::widget()->role('test-role')->render());
    }

    public function testStyle(): void
    {
        $this->assertSame('<a style="color:red;"></a>', A::widget()->style('color:red;')->render());
    }

    public function testSuffix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a></a>
            test-suffix
            HTML,
            A::widget()->suffix('test-suffix')->render(),
        );
    }

    public function testTarget(): void
    {
        $this->assertSame('<a target="_blank"></a>', A::widget()->target('_blank')->render());
    }

    public function testTabIndex(): void
    {
        $this->assertSame('<a tabindex="1"></a>', A::widget()->tabIndex(1)->render());
    }

    public function testTemplate(): void
    {
        $this->assertSame(
            '<a></a>',
            A::widget()->prefix('test-prefix')->suffix('test-suffix')->template('{tag}')->render(),
        );
    }

    public function testTitle(): void
    {
        $this->assertSame('<a title="test-title"></a>', A::widget()->title('test-title')->render());
    }

    public function testType(): void
    {
        $this->assertSame('<a type="text/html"></a>', A::widget()->type('text/html')->render());
    }

    public function testWithoutId(): void
    {
        $this->assertSame('<a></a>', A::widget()->id(null)->render());
    }

    public function testWithoutName(): void
    {
        $this->assertSame('<a></a>', A::widget()->name(null)->render());
    }
}
