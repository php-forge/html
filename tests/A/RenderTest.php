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
        Assert::equalsWithoutLE(
            <<<HTML
            <a aria-disabled="true"></a>
            HTML,
            A::widget()->ariaDisabled('true')->render()
        );
    }

    public function testAriaControls(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a aria-controls="aria-controls"></a>
            HTML,
            A::widget()->ariaControls('aria-controls')->render()
        );
    }

    public function testAriaExpanded(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a aria-expanded="true"></a>
            HTML,
            A::widget()->ariaExpanded('true')->render()
        );
    }

    public function testAriaLabel(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a aria-label="aria-label"></a>
            HTML,
            A::widget()->ariaLabel('aria-label')->render()
        );
    }

    public function testAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a class="class"></a>
            HTML,
            A::widget()->attributes([
                'class' => 'class',
            ])->render()
        );
    }

    public function testAutofocus(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a autofocus></a>
            HTML,
            A::widget()->autofocus()->render()
        );
    }

    public function testClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a class="class"></a>
            HTML,
            A::widget()->class('class')->render()
        );
    }

    public function testContent(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a>content</a>
            HTML,
            A::widget()->content('content')->render()
        );
    }

    public function testDataAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a data-action="action"></a>
            HTML,
            A::widget()->dataAttributes([
                DataAttributes::ACTION => 'action',
            ])->render()
        );
    }

    public function testDownload(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a download></a>
            HTML,
            A::widget()->download()->render()
        );
    }

    public function testElement(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a></a>
            HTML,
            A::widget()->render()
        );
    }

    public function testHidden(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a hidden></a>
            HTML,
            A::widget()->hidden()->render()
        );
    }

    public function testHref(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a href="href"></a>
            HTML,
            A::widget()->href('href')->render()
        );
    }

    public function testHreflang(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a hreflang="hreflang"></a>
            HTML,
            A::widget()->hreflang('hreflang')->render()
        );
    }

    public function testId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a id="id"></a>
            HTML,
            A::widget()->id('id')->render()
        );
    }

    public function testLang(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a lang="lang"></a>
            HTML,
            A::widget()->lang('lang')->render()
        );
    }

    public function testName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a name="name"></a>
            HTML,
            A::widget()->name('name')->render()
        );
    }

    public function testPing(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a ping="ping"></a>
            HTML,
            A::widget()->ping('ping')->render()
        );
    }

    public function testPrefix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            prefix
            <a></a>
            HTML,
            A::widget()->prefix('prefix')->render(),
        );
    }

    public function testRel(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a rel="preload"></a>
            HTML,
            A::widget()->rel('preload')->render()
        );
    }

    public function testReferrerpolicy(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a referrerpolicy="no-referrer"></a>
            HTML,
            A::widget()->referrerpolicy('no-referrer')->render()
        );
    }

    public function testRole(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a role="role"></a>
            HTML,
            A::widget()->role('role')->render()
        );
    }

    public function testStyle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a style="style"></a>
            HTML,
            A::widget()->style('style')->render()
        );
    }

    public function testSuffix(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a></a>
            suffix
            HTML,
            A::widget()->suffix('suffix')->render(),
        );
    }

    public function testTarget(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a target="_blank"></a>
            HTML,
            A::widget()->target('_blank')->render()
        );
    }

    public function testTabIndex(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a tabindex="1"></a>
            HTML,
            A::widget()->tabIndex(1)->render()
        );
    }

    public function testTemplate(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a></a>
            HTML,
            A::widget()->suffix('suffix')->template('{tag}')->render(),
        );
    }

    public function testTitle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a title="title"></a>
            HTML,
            A::widget()->title('title')->render()
        );
    }

    public function testType(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a type="text/html"></a>
            HTML,
            A::widget()->type('text/html')->render()
        );
    }

    public function testWithoutId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a></a>
            HTML,
            A::widget()->id(null)->render()
        );
    }

    public function testWithoutName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <a></a>
            HTML,
            A::widget()->name(null)->render()
        );
    }
}
