<?php

namespace Tests\Unit\Traces;

use Ironwoods\Services\File\DataReaderService;
use PHPUnit\Framework\TestCase;

// Run all tests:
// vendor/bin/phpunit tests/Unit/Traces --color
// vendor/bin/phpunit tests/Unit/Traces/TracesTest.php --color

final class TracesTest extends TestCase
{

    public function setUp(): void
    {
        parent::setUp();

        require_once dirname(__DIR__, 6) . '/config/init.php'; // app constants
        require_once BASE_PATH . 'app/Helpers/loader.php';
    }

    // public function test_get_exception_details(): void
    // {
    //     $message = 'Something was wrong';
    //     try {
    //         throw new \Exception($message);
    //     } catch (\Exception $e) {
    //         $str = getExceptionStr($e);
    //     }

    //     $this->assertIsString($str);
    //     $this->assertNotEmpty($str);
    //     $this->assertTrue(str_contains($str, $message));
    // }

    // public function test_get_this_class_and_method_name(): void
    // {
    //     $expected = 'TracesTest@test_get_this_class_and_method_name';

    //     $result = go();
    //     $this->assertIsString($result);
    //     $this->assertNotEmpty($result);
    //     $this->assertEquals($expected, $result);

    // }

    public function test_logs_creation(): void
    {
        $logsPath = storage_path() . 'logs/';
        $this->assertTrue(removeFiles($logsPath));

        logger('Lorem ipsum');
        dd(getFilePaths($logsPath));// HACK:
        $filePaths = getFilePaths($logsPath);
        print_r($filePaths);
        dd($logsPath, (int) empty($filePaths));
        $this->assertCount(1, $filePaths);

        $fileContent = DataReaderService::readRowByRow($filePaths[0]);
        $this->assertCount(2, $fileContent);
    }
}
