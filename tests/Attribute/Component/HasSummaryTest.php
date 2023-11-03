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

        $instance = $instance->summaryClass('foo');

        $this->assertSame('foo', $instance->getSummaryClass());

        $instance = $instance->summaryClass('bar');

        $this->assertSame('foo bar', $instance->getSummaryClass());
    }

    public function testImmutablity(): void
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
