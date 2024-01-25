<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests;

use PHPForge\Html\Button;
use PHPUnit\Framework\TestCase;

final class MethodTest extends TestCase
{
    public function testPrintMethods(): void
    {
        $methods = get_class_methods(Button::class);

        sort($methods);
        var_dump(implode("\n", $methods));
        die;
    }
}
