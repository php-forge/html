<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests;

use InvalidArgumentException;
use PHPForge\Html\HtmlBuilder;
use PHPForge\Support\Assert;
use PHPUnit\Framework\TestCase;

final class HtmlBuilderTest extends TestCase
{
    public function testBegin(): void
    {
        $this->assertSame('<div>', HtmlBuilder::begin('div'));
        $this->assertSame('<div class="class">', HtmlBuilder::begin('div', ['class' => 'class']));
    }

    /**
     * @dataProvider PHPForge\Html\Tests\Provider\TagProvider::create
     *
     * @param string $tagName Tag name.
     * @param string $content Tag content.
     * @param array $attributes Tag attributes.
     * @param string $expected Expected result.
     */
    public function testCreate(string $tagName, string $content, array $attributes, string $expected): void
    {
        Assert::equalsWithoutLE($expected, HtmlBuilder::create($tagName, $content, $attributes));
    }

    public function testEnd(): void
    {
        $this->assertSame('</div>', HtmlBuilder::end('div'));
    }

    public function testException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Tag name cannot be empty.');

        HtmlBuilder::create('');
    }
}
