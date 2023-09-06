<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Component;

use PHPForge\Html\Attribute\Component\HasDisabled;
use PHPUnit\Framework\TestCase;

final class HasDisabledTest extends TestCase
{
    public function testImmutablity(): void
    {
        $instance = new class() {
            use HasDisabled;
        };

        $this->assertNotSame($instance, $instance->disabled());
    }

    public function testIsDisabled(): void
    {
        $instance = new class() {
            use HasDisabled;
        };

        $this->assertFalse($instance->isDisabled());
        $this->assertTrue($instance->disabled()->isDisabled());
    }

    public function testRender(): void
    {
        $instance = new class() {
            use HasDisabled;

            public function getDisabled(): bool
            {
                return $this->disabled;
            }
        };

        $this->assertFalse($instance->getDisabled());
        $this->assertTrue($instance->disabled()->getDisabled());
    }
}
