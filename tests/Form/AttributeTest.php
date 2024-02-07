<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Form;

use PHPForge\Html\Form;
use PHPForge\Html\Span;
use PHPForge\Support\Assert;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class AttributeTest extends TestCase
{
    public function testAccept(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <form accept="value">
            </form>
            HTML,
            Form::widget()->accept('value')->render()
        );
    }

    public function testAction(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <form action="value">
            </form>
            HTML,
            Form::widget()->action('value')->render()
        );
    }

    public function testAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <form class="value">
            </form>
            HTML,
            Form::widget()->attributes(['class' => 'value'])->render()
        );
    }

    public function testAutocomplete(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <form autocomplete="on">
            </form>
            HTML,
            Form::widget()->autocomplete('on')->render()
        );
    }

    public function testClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <form class="value">
            </form>
            HTML,
            Form::widget()->class('value')->render()
        );
    }

    public function testContent(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <form action="value" method="POST" _csrf="csrf-token">
            <input name="_csrf" type="hidden" value="csrf-token">
            value
            <span>value</span>
            </form>
            HTML,
            Form::widget()
                ->action('value')
                ->content('value', PHP_EOL, Span::widget()->content('value'))
                ->csrf('csrf-token')
                ->method('POST')
                ->render()
        );
    }

    public function testEnctype(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <form enctype="multipart/form-data">
            </form>
            HTML,
            Form::widget()->enctype('multipart/form-data')->render()
        );
    }

    public function testId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <form id="value">
            </form>
            HTML,
            Form::widget()->id('value')->render()
        );
    }

    public function testLang(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <form lang="value">
            </form>
            HTML,
            Form::widget()->lang('value')->render()
        );
    }

    public function testMethod(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <form method="GET">
            </form>
            HTML,
            Form::widget()->method('GET')->render()
        );
    }

    public function testName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <form name="value">
            </form>
            HTML,
            Form::widget()->name('value')->render()
        );
    }

    public function testNovalidate(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <form novalidate>
            </form>
            HTML,
            Form::widget()->novalidate()->render()
        );
    }

    public function testRel(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <form rel="alternate">
            </form>
            HTML,
            Form::widget()->rel('alternate')->render()
        );
    }

    public function testStyle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <form style="value">
            </form>
            HTML,
            Form::widget()->style('value')->render()
        );
    }

    public function testTitle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <form title="value">
            </form>
            HTML,
            Form::widget()->title('value')->render()
        );
    }

    public function testWithoutId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <form>
            </form>
            HTML,
            Form::widget()->id(null)->render()
        );
    }

    public function testWithoutName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <form>
            </form>
            HTML,
            Form::widget()->name(null)->render()
        );
    }
}
