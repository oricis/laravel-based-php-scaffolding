<?php

namespace Tests\Unit\Strings;

use PHPUnit\Framework\TestCase;

// Run all tests:
// vendor/bin/phpunit tests/Unit/Strings --color
// vendor/bin/phpunit tests/Unit/Strings/StringsTest.php --color

class StringsTest extends TestCase
{

    public function setUp(): void
    {
        parent::setUp();
    }

    public function test_get_last_string_slice(): void
    {
        // @getLastSlice(string $str = '', string $separator = '/'): string

        $url = 'https://www.foo.io/foo';
        $expected = 'foo';
        $result = getLastSlice($url);
        $this->assertEquals($expected, $result);
        $result = getLastSlice($url, '/');
        $this->assertEquals($expected, $result);
    }

    public function test_replace_weird_chars(): void
    {
        // @normalizeChars(string $str):? string

        $str = 'Amón Ñu';
        $expected = 'Amon Nu';
        $result = normalizeChars($str);

        $this->assertIsString($result);
        $this->assertNotEmpty($result);
        $this->assertEquals($expected, $result);
    }

    public function test_prepare_string_from_array(): void
    {
        // @prepareStr(array $arrStrs, string $separator = ','): string

        $expected = 'aaa';
        $result = prepareStr(explode(',', $expected));
        $this->assertIsString($result);
        $this->assertNotEmpty($result);
        $this->assertEquals($expected, $result);

        $expected = '1,2,67';
        $result = prepareStr([1,2,67]);
        $this->assertIsString($result);
        $this->assertNotEmpty($result);
        $this->assertEquals($expected, $result);
    }

    public function test_generate_random_string(): void
    {
        // @random(int $length = 12, string $chars = ''): string

        $size = 9;
        $result = random($size);
        $this->assertIsString($result);
        $this->assertEquals($size, strlen($result));

        $size = 3;
        $expected = 'aaa';
        $result = random($size, 'a');
        $this->assertIsString($result);
        $this->assertEquals($size, strlen($result));
        $this->assertEquals($expected, $result);
    }

    public function test_get_a_slug_from_string(): void
    {
        // @slugify(string $str, string $char = '-'): string

        $str = 'Hola mundo  ';
        $expected = 'Hola-mundo';
        $result = slugify($str);
        $this->assertEquals($expected, $result);

        $str = '¡Hola mundo!';
        $expected = '-Hola-mundo';
        $result = slugify($str);
        $this->assertEquals($expected, $result);
    }

    public function test_check_if_a_string_contains_a_needle(): void
    {
        // @str_contains(string $haystack, string $needle): bool

        $str = 'Lorem ipsum, sit amet';
        $needle = 'ipsum';
        $this->assertTrue(str_contains($str, $needle));

        $str = 'Lorem ipsum, sit amet';
        $needle = 'foo';
        $this->assertFalse(str_contains($str, $needle));
    }

    public function test_check_if_a_string_contains_some_of_the_needles(): void
    {
        // @str_contains_some(string $haystack, array $needles): bool

        $str = 'Lorem ipsum, sit amet';
        $needles = ['ipsum'];
        $this->assertTrue(str_contains_some($str, $needles));

        $str = 'Lorem ipsum, sit amet';
        $needles = ['foo', 'sit'];
        $this->assertTrue(str_contains_some($str, $needles));

        $str = 'Lorem ipsum, sit amet';
        $needles = ['foo'];
        $this->assertFalse(str_contains_some($str, $needles));
    }
}
