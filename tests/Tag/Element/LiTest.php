<?php

declare(strict_types=1);

namespace Forge\Html\Tag\Element;

use Forge\Html\Tag\Element\Li;
use PHPUnit\Framework\TestCase;

final class LiTest extends TestCase
{
    public function testCreate(): void
    {
        $this->li = new Li();
        $this->assertSame('<li></li>', $this->li->create());
        $this->assertSame('<li class="class"></li>', $this->li->create(['class' => 'class']));
        $this->assertSame('<li class="class">Content</li>', $this->li->create(['class' => 'class'], 'Content'));
    }
}
