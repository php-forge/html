<?php

declare(strict_types=1);

namespace Forge\Html\Tests\Tag;

use Forge\Html\Tag\Tag;
use Forge\TestUtils\Assert;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

final class TagTest extends TestCase
{
    public function testBegin(): void
    {
        $this->assertSame('<div>', Tag::begin('div'));
        $this->assertSame('<div class="class">', Tag::begin('div', ['class' => 'class']));
    }

    public function createProvider(): array
    {
        return [
            [
                'article',
                '',
                ['id' => 'id-1', 'class' => 'class'],
                '<article class="class" id="id-1">' . PHP_EOL . '</article>',
            ],
            ['br', '', [], '<br>'],
            ['BR', '', [], '<br>'],
            ['hr', '', [], '<hr>'],
            ['HR', '', [], '<hr>'],
            ['div', 'Content', [], '<div>' . PHP_EOL . 'Content' . PHP_EOL . '</div>'],
            [
                'input',
                '',
                ['type' => 'text', 'name' => 'test', 'value' => '<>'],
                '<input name="test" type="text" value="&lt;&gt;">',
            ],
            ['span', '', [], '<span></span>'],
            ['span', '', ['disabled' => true], '<span disabled></span>'],
        ];
    }

    /**
     * @dataProvider createProvider
     *
     * @param string $tagName Tag name.
     * @param string $content Tag content.
     * @param array $attributes Tag attributes.
     * @param string $expected Expected result.
     */
    public function testCreate(string $tagName, string $content, array $attributes, string $expected): void
    {
        $assert = new Assert();
        $assert->equalsWithoutLE($expected, Tag::create($tagName, $content, $attributes));
    }

    public function testEnd(): void
    {
        $this->assertSame('</div>', Tag::end('div'));
    }

    public function testException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Tag name cannot be empty.');
        Tag::create('');
    }
}
