<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Component;

use PHPForge\Html\Attribute\Component\HasLink;
use PHPUnit\Framework\TestCase;

final class HasLinkTest extends TestCase
{
    public function testGetLink(): void
    {
        $instance = new class () {
            use HasLink;
        };

        $this->assertSame('value', $instance->link('value')->getLink());
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasLink;
        };

        $this->assertNotSame($instance, $instance->link(''));
    }
}
