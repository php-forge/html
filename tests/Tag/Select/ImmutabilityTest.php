<?php

declare(strict_types=1);

namespace Forge\Html\Widgets\Tests\Tag\Select;

use Forge\Html\Tag\Select;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class ImmutabilityTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testImmutability(): void
    {
        $select = Select::create();
        $this->assertNotSame($select, $select->attributes([]));
        $this->assertNotSame($select, $select->groups([]));
        $this->assertNotSame($select, $select->items([]));
        $this->assertNotSame($select, $select->itemsAttributes([]));
        $this->assertNotSame($select, $select->prompt(''));
    }
}
