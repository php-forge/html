<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Section;

use PHPForge\Html\Section;
use PHPForge\Support\Assert;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class RenderTest extends TestCase
{
    public function testBlockLevelElements(): void
    {
        $this->assertSame('<section>test block</section>', Section::widget()->begin() . 'test block' . Section::end());
    }

    public function testElement(): void
    {
        Assert::equalsWithoutLE(
            <<<HTML
            <section>
            test element
            </section>
            HTML,
            Section::widget()->content('test element')->render(),
        );
    }
}
