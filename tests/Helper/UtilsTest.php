<?php

declare(strict_types=1);

namespace Forge\Html\Tests\Helper;

use Forge\Html\Helper\Utils;
use PHPUnit\Framework\TestCase;

final class UtilsTest extends TestCase
{
    public function testGenerateArrayableName(): void
    {
        $this->assertSame('test.name[]', Utils::generateArrayableName('test.name'));
    }
}
