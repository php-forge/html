<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Component;

use PHPForge\Html\Attribute\Component\HasSummaryCollection;
use PHPUnit\Framework\TestCase;

final class HasSummaryCollectionTest extends TestCase
{
    public function testClass(): void
    {
        $instance = new class () {
            use HasSummaryCollection;

            public function getSummaryClass(): string
            {
                return $this->summaryAttributes['class'] ?? '';
            }
        };

        $this->assertEmpty($instance->getSummaryClass());

        $instance = $instance->summaryClass('class');

        $this->assertSame('class', $instance->getSummaryClass());

        $instance = $instance->summaryClass('class-1');

        $this->assertSame('class class-1', $instance->getSummaryClass());

        $instance = $instance->summaryClass('override-class', true);

        $this->assertSame('override-class', $instance->getSummaryClass());
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasSummaryCollection;
        };

        $this->assertNotSame($instance, $instance->summaryAttributes([]));
        $this->assertNotSame($instance, $instance->summaryClass(''));
        $this->assertNotSame($instance, $instance->summaryLabel(''));
        $this->assertNotSame($instance, $instance->summarySeparator(''));
    }
}
