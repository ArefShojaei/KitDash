<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Kit\Utils\Fs\{
    Directory,
    File
};


final class FsTest extends TestCase {
    private const FOLDER_NAME = "\\tmp\\";

    private const FILE_NAME = "data";

    private const FILE_EXT = ".txt";

    private string $folderPath;

    private string $filePath;

    private string $fileContent = "Testing module...";



    protected function setUp(): void{
        $this->folderPath = dirname(__DIR__, 2) . self::FOLDER_NAME;

        $this->filePath = $this->folderPath . self::FILE_NAME . self::FILE_EXT;
    }

    /**
     * @test
     */
    public function createFolder(): bool {
        $isMake = Directory::create($this->folderPath);

        $this->assertIsBool($isMake);

        $isMake ? $this->assertTrue($isMake) : $this->assertFalse($isMake);

        return true;
    }

    /**
     * @test
     */
    public function isExistsDirectory(): void {
        $isExists = Directory::has($this->folderPath);

        $this->assertIsBool($isExists);

        $isExists ? $this->assertTrue($isExists) : $this->assertFalse($isExists);
    }

    /**
     * @test
     * @depends createFolder 
     */
    public function createFile(bool $isExistsDirectory): void {
        if (!$isExistsDirectory) return;

        $isMake = File::save($this->filePath, $this->fileContent);

        $isMake ? $this->assertTrue($isMake) : $this->assertFalse($isMake);
    }

    /**
     * @test
     * @depends createFolder
     */
    public function isExistsFile(bool $isExistsDirectory): void {
        if ($isExistsDirectory) return;
        
        $isExists = File::has($this->filePath);
        
        $this->assertIsBool($isExists);

        $isExists ? $this->assertTrue($isExists) : $this->assertFalse($isExists);
    }

    /**
     * @test
     */
    public function getFileContent(): void {
        if (!File::has($this->folderPath)) return;

        $content = File::get($this->filePath);

        $this->assertIsString($content);
        $this->assertIsNotBool($content);
        $this->assertStringContainsString(needle:$this->fileContent, haystack:$content);
    }

    /**
     * @test
     */
    public function destroyFileAndFolder(): void {
        $isDeletedFile = unlink($this->filePath);
        $isDeletedFolder = rmdir($this->folderPath);

        $this->assertIsBool($isDeletedFile);
        $this->assertIsBool($isDeletedFolder);
        
        $this->assertTrue($isDeletedFile);
        $this->assertTrue($isDeletedFolder);
    }
}