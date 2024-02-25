<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests;

use PHPForge\Html\Input\Search;
use PHPUnit\Framework\TestCase;

final class Method extends TestCase
{
    public function testMethods(): void
    {
        $methods = get_class_methods(Search::class);
        sort($methods);

        var_dump(implode("\n", $methods));
    }
}
