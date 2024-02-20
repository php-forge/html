<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Grouping\Ul;

use PHPForge\Html\Grouping\Ul;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class ImmutableTest extends TestCase
{
    public function testImmutable(): void
    {
        $ul = Ul::widget();

        $this->assertNotSame($ul, $ul->content(''));
    }
}
