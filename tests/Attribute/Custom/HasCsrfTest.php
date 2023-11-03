<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Attribute\Custom;

use PHPForge\Html\Attribute\Custom\HasCsrf;
use PHPUnit\Framework\TestCase;
use Stringable;

final class HasCsrfTest extends TestCase
{
    public function testImmutablity(): void
    {
        $instance = new class () {
            use HasCsrf;
        };

        $this->assertNotSame($instance, $instance->csrf('', ''));
    }

    public function testStringable(): void
    {
        $instance = new class () {
            use HasCsrf;

            public function getCsrfToken(): string
            {
                return $this->csrfToken;
            }
        };

        $instance = $instance->csrf(
            new class () implements Stringable {
                public function __toString(): string
                {
                    return 'csrf_token';
                }
            },
        );

        $this->assertSame('csrf_token', $instance->getCsrfToken());
    }

    public function testValue(): void
    {
        $instance = new class () {
            use HasCsrf;

            public function getCsrfName(): string
            {
                return $this->csrfName;
            }

            public function getCsrfToken(): string
            {
                return $this->csrfToken;
            }
        };

        $this->assertSame('_csrf', $instance->getCsrfName());
        $this->assertEmpty($instance->getCsrfToken());

        $instance = $instance->csrf('csrf_token', 'csrf_name');

        $this->assertSame('csrf_name', $instance->getCsrfName());
        $this->assertSame('csrf_token', $instance->getCsrfToken());
    }
}
