<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Group\Ol;

use PHPForge\Html\Group\Ol;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class ImmutableTest extends TestCase
{
    public function testImmutable(): void
    {
        $ul = Ol::widget();

        $this->assertNotSame($ul, $ul->content(''));
    }
}
