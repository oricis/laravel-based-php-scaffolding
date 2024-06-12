<?php

namespace Tests\Unit\Files;

use PHPUnit\Framework\TestCase;

// Run all tests:
// vendor/bin/phpunit tests/Unit/Files --color
// vendor/bin/phpunit tests/Unit/Files/FilesTest.php --color

class FilesTest extends TestCase
{

    public function setUp(): void
    {
        parent::setUp();

        require_once dirname(__DIR__, 6) . '/config/init.php'; // app constants
        require_once BASE_PATH . 'app/Helpers/loader.php';
    }

    public function test_get_file_paths_from_a_directory(): void
    {
        // @getFilePaths(
        //     string $directoryPath,
        //     string $fileExtension = 'php',
        //     string $pattern = ''
        // ): array

        logger('testing...');
        $logsPath = storage_path() . 'logs/';

        $result = getFilePaths($logsPath, 'md');
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);

        $result = getFilePaths($logsPath, 'xpath');
        $this->assertIsArray($result);
        $this->assertEmpty($result);
    }

    public function test_check_directories_existence(): void
    {
        // @existsDirectories(array $directoryPaths): bool

        $this->assertFalse(existsDirectories(['xxx', 'pepe-pito']));
        $this->assertTrue(existsDirectories([base_path(), app_path()]));
    }

    public function test_if_the_files_were_removed(): void
    {
        // @removeFiles(string $path, array $fileExtensions): bool

        logger('testing...');
        $logsPath = storage_path() . 'logs/';
        $this->assertTrue(removeFiles($logsPath, ['md']));
        $this->assertTrue(removeFiles($logsPath, ['md'])); // empty directories
    }
}
