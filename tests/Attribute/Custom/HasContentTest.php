<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use PHPForge\Html\Attribute\Custom\HasContent;
use PHPUnit\Framework\TestCase;

final class HasContentTest extends TestCase
{
    public function testGet(): void
    {
        $instance = new class () {
            use HasContent;
        };

        $this->assertSame('', $instance->getContent());

        $instance = $instance->content('foo');

        $this->assertSame('foo', $instance->getContent());
    }

    public function testImmutablity(): void
    {
        $instance = new class () {
            use HasContent;

            protected string $containerTag = 'div';
        };

        $this->assertNotSame($instance, $instance->content(''));
    }

    public function testXSS(): void
    {
        $instance = new class () {
            use HasContent;

            public function getContent(): string
            {
                return $this->content;
            }
        };

        $instance = $instance->content("<script>alert('Hack');</script>");

        $this->assertEmpty($instance->getContent());
    }
}
