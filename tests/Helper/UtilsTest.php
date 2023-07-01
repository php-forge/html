<?php

declare(strict_types=1);

namespace PHPForge\Html\Tests\Helper;

use InvalidArgumentException;
use PHPForge\Html\Helper\Utils;
use PHPUnit\Framework\TestCase;

final class UtilsTest extends TestCase
{
    public function testGenerateArrayableName(): void
    {
        $this->assertSame('test.name[]', Utils::generateArrayableName('test.name'));
    }

    public function testGenerateInputId(): void
    {
        $this->assertSame('utilstest-string', Utils::generateInputId('UtilsTest', 'string'));
    }

    /**
     * @dataProvider PHPForge\Html\Tests\Provider\UtilsProvider::dataGetInputName
     */
    public function testGetInputName(string $formName, string $attribute, string $expected): void
    {
        $this->assertSame($expected, Utils::generateInputName($formName, $attribute));
    }

    public function testGetInputNamewithOnlyCharacters(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Attribute name must contain word characters only.');

        Utils::generateInputName('TestForm', 'content body');
    }

    public function testGetInputNameExceptionWithTabular(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The form name cannot be empty for tabular inputs.');

        Utils::generateInputName('', '[0]dates[0]');
    }

    public function testMultibyteGenerateArrayableName(): void
    {
        $this->assertSame('登录[]', Utils::generateArrayableName('登录'));
        $this->assertSame('登录[]', Utils::generateArrayableName('登录[]'));
        $this->assertSame('登录[0][]', Utils::generateArrayableName('登录[0]'));
        $this->assertSame('[0]登录[0][]', Utils::generateArrayableName('[0]登录[0]'));
    }

    public function testMultibyteGenerateInputId(): void
    {
        $this->assertSame('testform-mąka', Utils::generateInputId('TestForm', 'mĄkA'));
    }

    /**
     * @dataProvider PHPForge\Html\Tests\Provider\UtilsProvider::normalizeRegexpPattern
     *
     * @param string $expected The expected result.
     * @param string $regexp The regexp pattern to normalize.
     * @param string|null $delimiter The delimiter to use.
     */
    public function testNormalizeRegexpPattern(string $expected, string $regexp, ?string $delimiter = null): void
    {
        $this->assertSame($expected, Utils::normalizeRegexpPattern($regexp, $delimiter));
    }

    /**
     * @dataProvider PHPForge\Html\Tests\Provider\UtilsProvider::normalizeRegexpPatternInvalid
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

    public function testShortNameClass(): void
    {
        $this->assertSame('UtilsTest::class', Utils::shortNameClass(self::class));
    }
}
