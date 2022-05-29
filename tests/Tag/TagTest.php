<?php

declare(strict_types=1);

namespace Forge\Html\Tests\Tag;

use Forge\Html\Tag\Tag;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

final class TagTest extends TestCase
{
    public function testBegin(): void
    {
        $this->tag = new Tag();
        $this->assertSame('<div>', $this->tag->begin('div'));
        $this->assertSame('<div class="class">', $this->tag->begin('div', ['class' => 'class']));
    }

    public function testCreate(): void
    {
        $this->tag = new Tag();
        $this->assertSame('<br>', $this->tag->create('br'));
        $this->assertSame('<br>', $this->tag->create('BR'));
        $this->assertSame('<span></span>', $this->tag->create('span'));
        $this->assertSame('<div>Content</div>', $this->tag->create('div', 'Content'));
        $this->assertSame('<span disabled></span>', $this->tag->create('span', '', ['disabled' => true]));
        $this->assertSame(
            '<input type="text" name="test" value="&lt;&gt;">',
            $this->tag->create('input', '', ['type' => 'text', 'name' => 'test', 'value' => '<>'])
        );
        $this->assertSame(
            '<article id="id-1" class="class"></article>',
            $this->tag->create('article', '', ['id' => 'id-1', 'class' => 'class'])
        );
    }

    public function testEnd(): void
    {
        $this->tag = new Tag();
        $this->assertSame('</div>', $this->tag->end('div'));
    }

    public function testException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Tag name cannot be empty.');
        $this->tag = new Tag();
        $this->tag->create('');
    }
}
