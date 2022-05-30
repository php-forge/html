<?php

declare(strict_types=1);

namespace Forge\Html\Tests\Tag\Element;

use Forge\Html\Tag\Element\A;
use PHPUnit\Framework\TestCase;

final class ATest extends TestCase
{
    public function testCreate(): void
    {
        $this->a = new A();
        $this->assertSame('<a></a>', $this->a->create());
    }

    public function testAttributes(): void
    {
        $this->a = new A();
        $this->assertSame(
            '<a href="/images/myw3schoolsimage.jpg" download></a>',
            $this->a->create(['download' => true, 'href' => '/images/myw3schoolsimage.jpg'])
        );
    }
}
