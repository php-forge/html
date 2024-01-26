<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests;

use PHPForge\Html\ButtonToggle;
use PHPUnit\Framework\TestCase;

final class Method extends TestCase
{
    public function testPrintMethods(): void
    {
        $methods = get_class_methods(ButtonToggle::class);

        sort($methods);
        var_dump(implode("\n", $methods));
        die;
    }
}
