<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Form;

use PHPForge\Html\Form;
use PHPForge\Html\Span;
use PHPForge\Support\Assert;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Stringable;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class RenderTest extends TestCase
{
    public function testAttributes(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <form class="test-class">
            </form>
            HTML,
            Form::widget()->attributes(['class' => 'test-class'])->render(),
        );
    }

    public function testBegin(): void
    {
        $this->assertSame(
            <<<HTML
            <form>
            HTML,
            Form::widget()->begin(),
        );

        Assert::equalsWithoutLE(
            <<<HTML
            <form action="/example" method="GET">
            <input name="id" type="hidden" value="1">
            <input name="title" type="hidden" value="&lt;">
            HTML,
            Form::widget()->action('/example?id=1&title=%3C')->method('GET')->begin(),
        );

        Assert::equalsWithoutLE(
            <<<HTML
            <form action="/foo" method="GET">
            <input name="p" type="hidden">
            HTML,
            Form::widget()->action('/foo?p')->method('GET')->begin(),
        );
    }

    public function testBlockLevelElements(): void
    {
        $this->assertSame('<form>test block</form>', Form::widget()->begin() . 'test block' . Form::end());
    }

    public function testClass(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <form class="test-class">
            </form>
            HTML,
            Form::widget()->class('test-class')->render(),
        );
    }

    public function testContent(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <form action="/foo" method="POST" _csrf="tokenCsrf">
            <input name="_csrf" type="hidden" value="tokenCsrf">
            test content
            <span>test-content</span>
            </form>
            HTML,
            Form::widget()
                ->action('/foo')
                ->content('test content', PHP_EOL, Span::widget()->content('test-content'))
                ->csrf('tokenCsrf')
                ->method('POST')
                ->render(),
        );
    }

    #[DataProvider('csrf')]
    public function testCsrf(string $expected, string $method, string|Stringable $csrfToken, string $csrfName): void
    {
        $formWidget = $csrfName !== ''
            ? Form::widget()->action('/foo')->csrf($csrfToken, $csrfName)->method($method)->begin()
            : Form::widget()->action('/foo')->csrf($csrfToken)->method($method)->begin();

        Assert::equalsWithoutLE($expected, $formWidget);
    }

    public function testElement(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <form>
            test element
            </form>
            HTML,
            Form::widget()->content('test element')->render(),
        );
    }

    public function testEnd(): void
    {
        Form::widget()->begin();

        $this->assertSame(
            <<<HTML
            </form>
            HTML,
            Form::end(),
        );
    }

    public function testId(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <form id="test-id">
            </form>
            HTML,
            Form::widget()->id('test-id')->render(),
        );
    }

    public function testLang(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <form lang="en">
            </form>
            HTML,
            Form::widget()->lang('en')->render(),
        );
    }

    public function testName(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <form name="test-name">
            </form>
            HTML,
            Form::widget()->name('test-name')->render(),
        );
    }

    public function testStyle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <form style="color:red;">
            </form>
            HTML,
            Form::widget()->style('color:red;')->render(),
        );
    }

    public function testTitle(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <form title="test-title">
            </form>
            HTML,
            Form::widget()->title('test-title')->render(),
        );
    }

    /**
     * Data provider for {@see testCsrf()}.
     *
     * @return array test data
     */
    public static function csrf(): array
    {
        return [
            // empty csrf name and token
            ['<form action="/foo" method="POST">', 'POST', '', ''],
            // empty csrf token
            ['<form action="/foo" method="POST">', 'POST', '', 'myToken'],
            // only csrf token value
            ['<form action="/foo" method="GET" _csrf="tokenCsrf">', 'GET', 'tokenCsrf', ''],
            // only csrf custom name
            [
                '<form action="/foo" method="POST" myToken="tokenCsrf">' . PHP_EOL .
                '<input name="myToken" type="hidden" value="tokenCsrf">',
                'post',
                'tokenCsrf',
                'myToken',
            ],
            // object stringable
            [
                '<form action="/foo" method="POST" myToken="tokenCsrf">' . PHP_EOL .
                '<input name="myToken" type="hidden" value="tokenCsrf">',
                'POST',
                new class() {
                    public function __toString(): string
                    {
                        return 'tokenCsrf';
                    }
                },
                'myToken',
            ],
        ];
    }
}
