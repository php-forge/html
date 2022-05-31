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
        $tag = new Tag();
        $this->assertSame('<div>', $tag->begin('div'));
        $this->assertSame('<div class="class">', $tag->begin('div', ['class' => 'class']));
    }

    public function createProvider(): array
    {
        return [
            ['article', '', ['id' => 'id-1', 'class' => 'class'], '<article id="id-1" class="class"></article>'],
            ['br', '', [], '<br>'],
            ['BR', '', [], '<br>'],
            ['div', 'Content', [], '<div>' . PHP_EOL . 'Content' . PHP_EOL . '</div>'],
            [
                'input',
                '',
                ['type' => 'text', 'name' => 'test', 'value' => '<>'],
                '<input type="text" name="test" value="&lt;&gt;">',
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
        $tag = new Tag();
        $assert->equalsWithoutLE($expected, $tag->create($tagName, $content, $attributes));
    }

    public function testEnd(): void
    {
        $tag = new Tag();
        $this->assertSame('</div>', $tag->end('div'));
    }

    public function testException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Tag name cannot be empty.');
        $tag = new Tag();
        $tag->create('');
    }
}
