<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use PHPForge\Html\Attribute\Custom\HasRenderStringable;
use PHPUnit\Framework\TestCase;
use Stringable;

final class HasRenderTest extends TestCase
{
    public function testRender(): void
    {
        $instance = new class () {
            use HasRenderStringable;
        };

        $this->assertSame('test', $instance->renderStringable('test'));
        $this->assertSame(
            'test',
            $instance->renderStringable(
                new class() implements Stringable {
                    public function __toString(): string
                    {
                        return 'test';
                    }
                }
            )
        );
    }
}
