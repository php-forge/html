<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use PHPForge\Html\Attribute\Custom\HasLinkAttributes;
use PHPUnit\Framework\TestCase;

final class HasLinkAttributeTest extends TestCase
{
    public function testLinkAttributes(): void
    {
        $instance = new class() {
            use HasLinkAttributes;

            public function getLinkAttributes(): array
            {
                return $this->linkAttributes;
            }
        };

        $instance = $instance->linkAttributes(['class' => 'foo']);
        $instance = $instance->linkAttributes(['disabled' => true]);

        $this->assertSame(['class' => 'foo', 'disabled' => true], $instance->getLinkAttributes());
    }

    public function testImmutablity(): void
    {
        $instance = new class() {
            use HasLinkAttributes;
        };

        $this->assertNotSame($instance, $instance->linkAttributes([]));
    }
}
