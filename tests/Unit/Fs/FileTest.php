<?php

namespace Tests\Unit\Fs;

use PHPUnit\Framework\TestCase;

use Kit\Fs\File;
use Kit\Fs\Interfaces\File as IFile;

final class FileTest extends TestCase
{
    private string $tempDir;
    private string $tempFile;

    protected function setUp(): void
    {
        $this->tempDir =
            sys_get_temp_dir() .
            DIRECTORY_SEPARATOR .
            "kitdash_test_" .
            uniqid();
        $this->tempFile = $this->tempDir . DIRECTORY_SEPARATOR . "test.txt";

        mkdir($this->tempDir, 0755, true);
    }

    protected function tearDown(): void
    {
        if (is_file($this->tempFile)) {
            unlink($this->tempFile);
        }

        $files = glob($this->tempDir . DIRECTORY_SEPARATOR . "*") ?: [];
        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file);
            }
        }

        if (is_dir($this->tempDir)) {
            rmdir($this->tempDir);
        }
    }

    /**
     * @test
     */
    public function isImplementedFileInterface(): void
    {
        $interfaces = class_implements(File::class);

        $this->assertIsArray($interfaces);
        $this->assertArrayHasKey(IFile::class, $interfaces);
    }

    /**
     * @test
     */
    public function hasReturnsTrueWhenFileExists(): void
    {
        file_put_contents($this->tempFile, "content");

        $this->assertTrue(File::has($this->tempFile));
    }

    /**
     * @test
     */
    public function hasReturnsFalseWhenFileDoesNotExist(): void
    {
        $this->assertFalse(File::has($this->tempDir . "/not-exists.txt"));
    }

    /**
     * @test
     */
    public function saveAndGetFileContent(): void
    {
        $content = "Hello KitDash";

        $this->assertTrue(File::save($this->tempFile, $content));
        $this->assertSame($content, File::get($this->tempFile));
    }

    /**
     * @test
     */
    public function getReturnsFalseWhenFileDoesNotExist(): void
    {
        $this->assertFalse(File::get($this->tempDir . "/missing.txt"));
    }

    /**
     * @test
     */
    public function appendAddsContentToFile(): void
    {
        File::save($this->tempFile, "Hello");
        File::append($this->tempFile, " World");

        $this->assertSame("Hello World", File::get($this->tempFile));
    }

    /**
     * @test
     */
    public function deleteRemovesFile(): void
    {
        File::save($this->tempFile, "to be deleted");

        $this->assertTrue(File::delete($this->tempFile));
        $this->assertFalse(File::has($this->tempFile));
    }

    /**
     * @test
     */
    public function deleteReturnsFalseWhenFileDoesNotExist(): void
    {
        $this->assertFalse(File::delete($this->tempDir . "/missing.txt"));
    }

    /**
     * @test
     */
    public function copyCreatesDuplicateFile(): void
    {
        File::save($this->tempFile, "original");

        $destination = $this->tempDir . DIRECTORY_SEPARATOR . "copy.txt";

        $this->assertTrue(File::copy($this->tempFile, $destination));
        $this->assertTrue(File::has($destination));
        $this->assertSame("original", File::get($destination));
    }

    /**
     * @test
     */
    public function moveRenamesOrMovesFile(): void
    {
        File::save($this->tempFile, "moving");

        $destination = $this->tempDir . DIRECTORY_SEPARATOR . "moved.txt";

        $this->assertTrue(File::move($this->tempFile, $destination));
        $this->assertFalse(File::has($this->tempFile));
        $this->assertTrue(File::has($destination));
        $this->assertSame("moving", File::get($destination));
    }

    /**
     * @test
     */
    public function renameChangesFileName(): void
    {
        File::save($this->tempFile, "rename me");

        $this->assertTrue(File::rename($this->tempFile, "renamed.txt"));

        $newPath = $this->tempDir . DIRECTORY_SEPARATOR . "renamed.txt";

        $this->assertTrue(File::has($newPath));
        $this->assertFalse(File::has($this->tempFile));
    }

    /**
     * @test
     */
    public function sizeReturnsFileSize(): void
    {
        $content = "12345";
        File::save($this->tempFile, $content);

        $this->assertSame(5, File::size($this->tempFile));
    }

    /**
     * @test
     */
    public function sizeReturnsFalseWhenFileDoesNotExist(): void
    {
        $this->assertFalse(File::size($this->tempDir . "/missing.txt"));
    }

    /**
     * @test
     */
    public function extensionReturnsFileExtension(): void
    {
        $this->assertSame("txt", File::extension($this->tempFile));
        $this->assertSame("php", File::extension("/path/to/file.php"));
        $this->assertSame("", File::extension("/path/to/file"));
    }

    /**
     * @test
     */
    public function nameReturnsFilenameWithoutExtension(): void
    {
        $this->assertSame("test", File::name($this->tempFile));
        $this->assertSame("file", File::name("/path/to/file.php"));
    }

    /**
     * @test
     */
    public function dirnameReturnsDirectoryPath(): void
    {
        $this->assertSame($this->tempDir, File::dirname($this->tempFile));
    }

    /**
     * @test
     */
    public function hashReturnsFileHash(): void
    {
        File::save($this->tempFile, "hash-me");

        $hash = File::hash($this->tempFile);

        $this->assertIsString($hash);
        $this->assertSame(hash_file("sha256", $this->tempFile), $hash);
    }

    /**
     * @test
     */
    public function hashWithCustomAlgorithm(): void
    {
        File::save($this->tempFile, "md5-test");

        $hash = File::hash($this->tempFile, "md5");

        $this->assertSame(hash_file("md5", $this->tempFile), $hash);
    }

    /**
     * @test
     */
    public function modifiedReturnsTimestamp(): void
    {
        File::save($this->tempFile, "timestamp");

        $mtime = File::modified($this->tempFile);

        $this->assertIsInt($mtime);
        $this->assertGreaterThan(0, $mtime);
    }

    /**
     * @test
     */
    public function mimeReturnsMimeType(): void
    {
        File::save($this->tempFile, "plain text content");

        $mime = File::mime($this->tempFile);

        $this->assertTrue(is_string($mime) || $mime === false);
    }
}
