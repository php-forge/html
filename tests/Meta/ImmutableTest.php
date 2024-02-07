<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Meta;

use PHPForge\Html\Meta;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class ImmutableTest extends TestCase
{
    public function testImmutable(): void
    {
        $meta = Meta::widget();

        $this->assertNotSame($meta, $meta->content('', ''));
    }
}
