<?php

namespace Tests\Unit\Array;

require_once dirname(__DIR__, 6) . '/vendor/autoload.php';

use Ironwoods\Enums\SortOption;
use Ironwoods\Services\Array\ArrTransformerService as ArrService;
use PHPUnit\Framework\TestCase;

// Run all tests:
// vendor/bin/phpunit tests/Unit/Array --color
// vendor/bin/phpunit tests/Unit/Array/ArrTransformerServiceTest.php --color

class ArrTransformerServiceTest extends TestCase
{

    public function setUp(): void
    {
        parent::setUp();
    }

    public function test_sort_asc_nested_arrays_by_different_keys(): void
    {
        // static @sortNestedArraysByKey(
        //     array $arr,
        //     int $keyToSort = 0,
        //     SortOption $sortOption = SortOption::ASC
        // ): array

        $rows = [
            null,
            ['Date', 'Amount', 'Value'],
            ['12-01-2021', 1000, 34],
            ['13-01-2021', 2000, 100],
            ['17-01-2021', 300, 1],
            [],
        ];

        $expected = [
            ['12-01-2021', 1000, 34],
            ['13-01-2021', 2000, 100],
            ['17-01-2021', 300, 1],
            ['Date', 'Amount', 'Value'],
        ];
        $result = ArrService::sortNestedArraysByKey($rows);
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertCount(count($expected), $result);
        $this->assertEquals($expected, $result);

        $expected = [
            ['17-01-2021', 300, 1],
            ['12-01-2021', 1000, 34],
            ['13-01-2021', 2000, 100],
            ['Date', 'Amount', 'Value'],
        ];
        $result = ArrService::sortNestedArraysByKey($rows, 1);
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertCount(count($expected), $result);
        $this->assertEquals($expected, $result);

        $expected = [
            ['17-01-2021', 300, 1],
            ['12-01-2021', 1000, 34],
            ['13-01-2021', 2000, 100],
            ['Date', 'Amount', 'Value'],
        ];
        $result = ArrService::sortNestedArraysByKey($rows, 2, SortOption::ASC);
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertCount(count($expected), $result);
        $this->assertEquals($expected, $result);
    }

    public function test_sort_desc_nested_arrays_by_different_keys(): void
    {
        // static @sortNestedArraysByKey(
        //     array $arr,
        //     int $keyToSort = 0,
        //     SortOption $sortOption = SortOption::ASC
        // ): array

        $rows = [
            null,
            ['Date', 'Amount', 'Value'],
            ['12-01-2021', 1000, 34],
            ['13-01-2021', 2000, 100],
            ['17-01-2021', 300, 1],
            [],
        ];

        $expected = [
            ['Date', 'Amount', 'Value'],
            ['17-01-2021', 300, 1],
            ['13-01-2021', 2000, 100],
            ['12-01-2021', 1000, 34],
        ];
        $result = ArrService::sortNestedArraysByKey($rows, 0, SortOption::DESC);
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertCount(count($expected), $result);
        $this->assertEquals($expected, $result);

        $expected = [
            ['Date', 'Amount', 'Value'],
            ['13-01-2021', 2000, 100],
            ['12-01-2021', 1000, 34],
            ['17-01-2021', 300, 1],
        ];
        $result = ArrService::sortNestedArraysByKey($rows, 2, SortOption::DESC);
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertCount(count($expected), $result);
        $this->assertEquals($expected, $result);
    }
}
