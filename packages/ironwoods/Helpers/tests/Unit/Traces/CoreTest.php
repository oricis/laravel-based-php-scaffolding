<?php

namespace Tests\Unit\Traces;

use PHPUnit\Framework\TestCase;

// Run all tests:
// vendor/bin/phpunit tests/Unit/Traces --color
// vendor/bin/phpunit tests/Unit/Traces/CoreTest.php --color

final class CoreTest extends TestCase
{

    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * @doesNotPerformAssertions
     */
    public function test_empty_string_dump(): void
    {
        $str = '';
        dump($str);
    }

    /**
     * @doesNotPerformAssertions
     */
    public function test_white_string_dump(): void
    {
        $str = '  ';
        dump($str);
    }

    /**
     * @doesNotPerformAssertions
     */
    public function test_not_empty_string_dump(): void
    {
        $str = 'Foo';
        dump($str);
    }

    /**
     * @doesNotPerformAssertions
     */
    public function test_dump_a_number(): void
    {
        $number = 344.55;
        dump($number);
    }

    /**
     * @doesNotPerformAssertions
     */
    public function test_dump_a_die(): void
    {
        $arr = [
            [],
            [1,3,56],
            [2,[5,5]],
            'Foo',
        ];
        dd(55, 'Foo', $arr);
    }
}
