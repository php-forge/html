<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\FormControl\Label;

use PHPForge\Html\FormControl\Label;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class ImmutableTest extends \PHPUnit\Framework\TestCase
{
    public function testImmutable(): void
    {
        $label = Label::widget();

        $this->assertNotSame($label, $label->for(''));
    }
}
