<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Form;

use PHPForge\Html\Form;
use PHPForge\Support\Assert;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Stringable;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class CustomMethodTest extends TestCase
{
    public function testBegin(): void
    {
        $this->assertSame(
            <<<HTML
            <form>
            HTML,
            Form::widget()->begin()
        );

        Assert::equalsWithoutLE(
            <<<HTML
            <form action="/example" method="GET">
            <input name="id" type="hidden" value="1">
            <input name="title" type="hidden" value="&lt;">
            HTML,
            Form::widget()->action('/example?id=1&title=%3C')->method('GET')->begin()
        );

        Assert::equalsWithoutLE(
            <<<HTML
            <form action="/foo" method="GET">
            <input name="p" type="hidden">
            HTML,
            Form::widget()->action('/foo?p')->method('GET')->begin()
        );
    }

    public function testBeginEnd(): void
    {
        $this->assertSame('<form>value</form>', Form::widget()->begin() . 'value' . Form::end());
    }

    #[DataProvider('csrf')]
    public function testCsrf(string $expected, string $method, string|Stringable $csrfToken, string $csrfName): void
    {
        $formWidget = $csrfName !== ''
            ? Form::widget()->action('/foo')->csrf($csrfToken, $csrfName)->method($method)->begin()
            : Form::widget()->action('/foo')->csrf($csrfToken)->method($method)->begin();

        Assert::equalsWithoutLE($expected, $formWidget);
    }

    public function testEnd(): void
    {
        Form::widget()->begin();

        $this->assertSame(
            <<<HTML
            </form>
            HTML,
            Form::end()
        );
    }

    public function testRender(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <form>
            </form>
            HTML,
            Form::widget()->render()
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
                new class () {
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
