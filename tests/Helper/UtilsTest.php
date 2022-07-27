<?php

declare(strict_types=1);

namespace Forge\Html\Tests\Helper;

use Forge\Html\Helper\Utils;
use InvalidArgumentException;
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

    public function normalizeRegexpPatternProvider(): array
    {
        return [
            ['', '//'],
            ['.*', '/.*/'],
            ['([a-z0-9-]+)', '/([a-z0-9-]+)/Ugimex'],
            ['([a-z0-9-]+)', '~([a-z0-9-]+)~Ugimex'],
            ['([a-z0-9-]+)', '~([a-z0-9-]+)~Ugimex', '~'],
            ['\u1F596([a-z])', '/\x{1F596}([a-z])/i'],
        ];
    }

    /**
     * @dataProvider normalizeRegexpPatternProvider
     *
     * @param string $expected The expected result.
     * @param string $regexp The regexp pattern to normalize.
     * @param string|null $delimiter The delimiter to use.
     */
    public function testNormalizeRegexpPattern(string $expected, string $regexp, ?string $delimiter = null): void
    {
        $this->assertSame($expected, Utils::normalizeRegexpPattern($regexp, $delimiter));
    }

    public function normalizeRegexpPatternInvalidProvider(): array
    {
        return [
            ['', 'The length of the regular expression cannot be less than 2.'],
            ['*', 'The length of the regular expression cannot be less than 2.'],
            ['.*', 'Incorrect regular expression.'],
            ['/.*', 'Incorrect regular expression.'],
            ['([a-z0-9-]+)', 'Incorrect regular expression.'],
            ['/.*/i', 'Incorrect regular expression.', '~'],
            ['/.*/i', 'Incorrect delimiter.', '//'],
            ['/~~/i', 'Incorrect delimiter.', '~~'],
        ];
    }

    /**
     * @dataProvider normalizeRegexpPatternInvalidProvider
     *
     * @param string $regexp The regexp pattern to normalize.
     * @param string $message The expected exception message.
     * @param string|null $delimiter The delimiter to use.
     */
    public function testNormalizeRegexpPatternInvalid(string $regexp, string $message, ?string $delimiter = null): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage($message);
        Utils::normalizeRegexpPattern($regexp, $delimiter);
    }
}
