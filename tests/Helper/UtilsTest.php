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

    public function testMultibyteGenerateArrayableName(): void
    {
        $this->assertSame('登录[]', Utils::generateArrayableName('登录'));
        $this->assertSame('登录[]', Utils::generateArrayableName('登录[]'));
        $this->assertSame('登录[0][]', Utils::generateArrayableName('登录[0]'));
        $this->assertSame('[0]登录[0][]', Utils::generateArrayableName('[0]登录[0]'));
    }
}
