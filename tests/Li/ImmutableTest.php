<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Li;

use PHPForge\Html\Li;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class ImmutableTest extends TestCase
{
    public function testImmutable(): void
    {
        $li = Li::widget();

        $this->assertNotSame($li, $li->content(''));
    }
}
