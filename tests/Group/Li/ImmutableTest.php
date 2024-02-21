<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Group\Li;

use PHPForge\Html\Group\Li;
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
