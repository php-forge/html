<?php

declare(strict_types=1);

namespace Forge\Html\Tests\Tag\Element;

use Forge\Html\Tag\Element\Nav;
use PHPUnit\Framework\TestCase;

final class NavTest extends TestCase
{
    public function testCreate(): void
    {
        $this->nav = new Nav();
        $this->assertSame('<nav></nav>', $this->nav->create());
        $this->assertSame('<nav class="class"></nav>', $this->nav->create(['class' => 'class']));
    }
}
