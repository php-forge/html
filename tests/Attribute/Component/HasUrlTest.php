<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Component;

use PHPForge\Html\Attribute\Component\HasUrl;
use PHPUnit\Framework\TestCase;

final class HasUrlTest extends TestCase
{
    public function testImmutablity(): void
    {
        $instance = new class () {
            use HasUrl;
        };

        $this->assertNotSame($instance, $instance->urlCreator(fn () => ''));
        $this->assertNotSame($instance, $instance->urlQueryParameters([]));
        $this->assertNotSame($instance, $instance->urlPath(''));
    }
}
