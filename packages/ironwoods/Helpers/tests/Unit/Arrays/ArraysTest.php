<?php

namespace Tests\Unit\Arrays;

use PHPUnit\Framework\TestCase;

// Run all tests:
// vendor/bin/phpunit tests/Unit/Arrays --color
// vendor/bin/phpunit tests/Unit/Arrays/ArraysTest.php --color

class ArraysTest extends TestCase
{

    public function setUp(): void
    {
        parent::setUp();
    }

    public function test_if_the_array_contains_a_value(): void
    {
        // @arr_contains(array $arr, string $needle): bool

        $assocArr = ['name' => 'Foo', 'age' => 34];
        $noAssocArr = ['apple', 'grape', 'onion'];

        $this->assertFalse(arr_contains($assocArr, 'xxx'));
        $this->assertTrue(arr_contains($assocArr, 'Foo'));
        $this->assertFalse(arr_contains($noAssocArr, 'xxx'));
        $this->assertTrue(arr_contains($noAssocArr, 'apple'));
    }

    public function test_if_the_array_is_associative(): void
    {
        // @isAssocArray(array $arr): bool

        $assocArr = ['name' => 'Foo', 'age' => 34];
        $result = isAssocArray($assocArr);
        $this->assertTrue($result);

        $noAssocArr = ['apple', 'grape', 'onion'];
        $result = isAssocArray($noAssocArr);
        $this->assertFalse($result);

        $noAssocArr = [1,2,3];
        $result = isAssocArray($noAssocArr);
        $this->assertFalse($result);

        $noAssocArr = [0 => 1, 2 => 2];
        $result = isAssocArray($noAssocArr);
        $this->assertFalse($result);
    }

    public function test_if_array_is_reindexed(): void
    {
        // @reindexArr(array $arr): array

        $arr = [
            0 => 1,
            3 => 2,
            1 => 3,
        ];
        $expected = [
            0 => 1,
            1 => 2,
            2 => 3,
        ];
        $result = reindexArr($arr);
        $this->assertIsArray($result);
        $this->assertEquals($expected, $result);
    }

    public function test_remove_array_empty_values(): void
    {
        // @removeArrayEmpties(array $arr, bool $reindex = true): array

        $arr = [0, 1, 2, null, '', -1];
        $expected = [1, 2, -1];

        $result = removeArrayEmpties($arr, true);
        $this->assertEquals($expected, $result);

        $result = removeArrayEmpties($arr, false); // no reindex
        $this->assertNotEquals($expected, $result);
    }

    public function test_remove_array_empty_values_with_multidimensional_array(): void
    {
        // @removeArrayEmpties(array $arr, bool $reindex = true): array

        $arr = [
            null,
            ['Date', 'Amount', 'Value'],
            ['12-01-2021', 1000, 34],
            ['13-01-2021', 2000, 100],
            ['17-01-2021', 300, 3114],
            [],
        ];
        $expected = [
            ['Date', 'Amount', 'Value'],
            ['12-01-2021', 1000, 34],
            ['13-01-2021', 2000, 100],
            ['17-01-2021', 300, 3114],
        ];

        $result = removeArrayEmpties($arr, true);
        $this->assertEquals($expected, $result);

        $result = removeArrayEmpties($arr, false); // no reindex
        $this->assertNotEquals($expected, $result);
    }

    public function test_array_keys_preservation(): void
    {
        // @preserveArrayKeys(array $arr, array $keysToSave): array

        $arr = [
            'name',
            'age' => 45,
        ];
        $toPreserve = [
            0,
        ];
        $expected = [
            'name',
        ];
        $result = preserveArrayKeys($arr, $toPreserve);
        $this->assertEquals($expected, $result);


        $toPreserve = [
            0,
            'age',
        ];
        $expected = [
            'name',
            'age' => 45,
        ];
        $result = preserveArrayKeys($arr, $toPreserve);
        $this->assertEquals($expected, $result);
    }

    public function test_array_values_preservation(): void
    {
        // @preserveArrayValues(array $arr, array $valuesToSave): array

        $arr = [
            'name',
            'age' => 45,
        ];
        $toPreserve = [
            'name',
        ];
        $expected = [
            'name',
        ];

        $result = preserveArrayValues($arr, $toPreserve);
        $this->assertEquals($expected, $result);


        $toPreserve = [
            'name',
            45,
        ];
        $expected = [
            'name',
            'age' => 45,
        ];
        $result = preserveArrayValues($arr, $toPreserve);
        $this->assertEquals($expected, $result);
    }

    public function test_array_keys_remotion(): void
    {
        // @removeArrayKeys(array $arr, array $keysToRemove): array

        $arr = [
            'name',
            'age' => 45,
        ];
        $toRemove = [
            0,
        ];
        $expected = [
            'age' => 45,
        ];
        $result = removeArrayKeys($arr, $toRemove);
        $this->assertEquals($expected, $result);


        $toRemove = [
            0,
            'age',
        ];
        $result = removeArrayKeys($arr, $toRemove);
        $this->assertEmpty($result);
    }

    public function test_array_values_remotion(): void
    {
        // @removeArrayValues(array $arr, array $keysToRemove): array

        $arr = [
            'name',
            'age' => 45,
        ];
        $toRemove = [
            'name',
        ];
        $expected = [
            'age' => 45,
        ];

        $result = removeArrayValues($arr, $toRemove);
        $this->assertEquals($expected, $result);


        $toRemove = [
            'name',
            45,
        ];
        $result = removeArrayValues($arr, $toRemove);
        $this->assertEmpty($result);
    }
}
