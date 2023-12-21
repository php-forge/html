<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Component;

use PHPForge\Html\Attribute\Component\HasSummary;
use PHPUnit\Framework\TestCase;

final class HasSummaryTest extends TestCase
{
    public function testClass(): void
    {
        $instance = new class () {
            use HasSummary;

            public function getSummaryClass(): string
            {
                return $this->summaryAttributes['class'] ?? '';
            }
        };

        $this->assertEmpty($instance->getSummaryClass());

        $instance = $instance->summaryClass('test-class');

        $this->assertSame('test-class', $instance->getSummaryClass());

        $instance = $instance->summaryClass('test-class-1');

        $this->assertSame('test-class test-class-1', $instance->getSummaryClass());

        $instance = $instance->summaryClass('test-override-class', true);

        $this->assertSame('test-override-class', $instance->getSummaryClass());
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasSummary;
        };

        $this->assertNotSame($instance, $instance->summaryAttributes([]));
        $this->assertNotSame($instance, $instance->summaryClass(''));
        $this->assertNotSame($instance, $instance->summaryLabel(''));
        $this->assertNotSame($instance, $instance->summarySeparator(''));
    }
}
