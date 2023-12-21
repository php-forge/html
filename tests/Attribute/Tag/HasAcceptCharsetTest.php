<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Tag;

use PHPForge\Html\Attribute\Tag\HasAcceptCharset;
use PHPUnit\Framework\TestCase;

final class HasAcceptCharsetTest extends TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasAcceptCharset;
        };

        $this->assertNotSame($instance, $instance->acceptCharset(''));
    }
}
