<?php

namespace Tests\Unit\Dates;

use PHPUnit\Framework\TestCase;

// Run all tests:
// vendor/bin/phpunit tests/Unit/Dates --color
// vendor/bin/phpunit tests/Unit/Dates/DatesTest.php --color

class DatesTest extends TestCase
{

    public function setUp(): void
    {
        parent::setUp();

        require_once dirname(__DIR__, 6) . '/config/init.php'; // app constants
        require_once BASE_PATH . 'app/Helpers/loader.php';
    }

    public function test_extract_year_from_string_date(): void
    {
        // @getYearFromDate(string $date, string $separator = '-'): int

        $date = '2020/10/12 19:34';
        $expected = 2020;
        $result = getYearFromDate($date);
        $this->assertIsInt($result);
        $this->assertNotEquals($expected, $result);
        $result = getYearFromDate($date, '/');
        $this->assertIsInt($result);
        $this->assertEquals($expected, $result);

        $date = '1-05-2020';
        $expected = 2020;
        $result = getYearFromDate($date);
        $this->assertIsInt($result);
        $this->assertEquals($expected, $result);
        $result = getYearFromDate($date, '/');
        $this->assertIsInt($result);
        $this->assertNotEquals($expected, $result);
    }

    public function test_if_the_string_date_not_belongs_to_the_year(): void
    {
        // @isOutOFYear(int $year, string $date, string $separator = '-'): bool

        $date = '2020/10/12 19:34';
        $this->assertTrue(isOutOFYear(2020, $date));
        $this->assertTrue(isOutOFYear(2000, $date));
        $this->assertTrue(isOutOFYear(2061, $date));
        $this->assertFalse(isOutOFYear(2020, $date, '/'));
        $this->assertTrue(isOutOFYear(2000, $date, '/'));
        $this->assertTrue(isOutOFYear(2061, $date, '/'));

        $date = '1-05-2020';
        $this->assertFalse(isOutOFYear(2020, $date));
        $this->assertTrue(isOutOFYear(2000, $date));
        $this->assertTrue(isOutOFYear(2061, $date));
    }
}
