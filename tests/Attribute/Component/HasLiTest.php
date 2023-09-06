<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Component;

use PHPForge\Html\Attribute\Component\HasLi;
use PHPUnit\Framework\TestCase;

final class HasLiTest extends TestCase
{
    public function testClass(): void
    {
        $instance = new class() {
            use HasLi;

            public function getLiAttributes(): string
            {
                return $this->liAttributes['class'] ?? '';
            }
        };

        $this->assertEmpty($instance->getLiAttributes());

        $instance = $instance->liClass('foo');

        $this->assertSame('foo', $instance->getLiAttributes());

        $instance = $instance->liClass('bar');

        $this->assertSame('foo bar', $instance->getLiAttributes());
    }

    public function testImmutablity(): void
    {
        $instance = new class() {
            use HasLi;
        };

        $this->assertNotSame($instance, $instance->liAttributes([]));
        $this->assertNotSame($instance, $instance->liClass(''));
    }
}
