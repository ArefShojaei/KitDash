<?php

namespace Tests\Unit\Fs;

use PHPUnit\Framework\TestCase;

use Kit\Fs\{Directory, File};
use Kit\Fs\Interfaces\Directory as IDirectory;

final class DirectoryTest extends TestCase
{
    private string $tempDir;
    private string $subDir;

    protected function setUp(): void
    {
        $this->tempDir =
            sys_get_temp_dir() .
            DIRECTORY_SEPARATOR .
            "kitdash_dir_" .
            uniqid();
        $this->subDir = $this->tempDir . DIRECTORY_SEPARATOR . "subdir";

        mkdir($this->tempDir, 0755, true);
    }

    protected function tearDown(): void
    {
        if (is_dir($this->tempDir)) {
            $this->removeDirectory($this->tempDir);
        }
    }

    private function removeDirectory(string $dir): void
    {
        $items = glob($dir . DIRECTORY_SEPARATOR . "*") ?: [];

        foreach ($items as $item) {
            if (is_dir($item)) {
                $this->removeDirectory($item);
            } else {
                unlink($item);
            }
        }

        rmdir($dir);
    }

    /**
     * @test
     */
    public function isImplementedDirectoryInterface(): void
    {
        $interfaces = class_implements(Directory::class);

        $this->assertIsArray($interfaces);
        $this->assertArrayHasKey(IDirectory::class, $interfaces);
    }

    /**
     * @test
     */
    public function hasReturnsTrueWhenDirectoryExists(): void
    {
        $this->assertTrue(Directory::has($this->tempDir));
    }

    /**
     * @test
     */
    public function hasReturnsFalseWhenDirectoryDoesNotExist(): void
    {
        $this->assertFalse(Directory::has($this->tempDir . "/not-exists"));
    }

    /**
     * @test
     */
    public function createMakesNewDirectory(): void
    {
        $newDir = $this->tempDir . DIRECTORY_SEPARATOR . "new-folder";

        $this->assertTrue(Directory::create($newDir));
        $this->assertTrue(Directory::has($newDir));
    }

    /**
     * @test
     */
    public function createReturnsTrueIfDirectoryAlreadyExists(): void
    {
        $this->assertTrue(Directory::create($this->tempDir));
    }

    /**
     * @test
     */
    public function createNestedDirectories(): void
    {
        $nested = $this->tempDir . "/a/b/c";

        $this->assertTrue(Directory::create($nested));
        $this->assertTrue(Directory::has($nested));
    }

    /**
     * @test
     */
    public function filesReturnsOnlyFiles(): void
    {
        File::save($this->tempDir . "/file1.txt", "one");
        File::save($this->tempDir . "/file2.txt", "two");
        Directory::create($this->subDir);

        $files = Directory::files($this->tempDir);

        $this->assertCount(2, $files);
        $this->assertContains(
            $this->tempDir . DIRECTORY_SEPARATOR . "file1.txt",
            $files,
        );
        $this->assertContains(
            $this->tempDir . DIRECTORY_SEPARATOR . "file2.txt",
            $files,
        );
    }

    /**
     * @test
     */
    public function directoriesReturnsOnlyDirectories(): void
    {
        Directory::create($this->subDir);
        Directory::create($this->tempDir . "/another");
        File::save($this->tempDir . "/file.txt", "content");

        $dirs = Directory::directories($this->tempDir);

        $this->assertCount(2, $dirs);
        $this->assertContains($this->subDir, $dirs);
    }

    /**
     * @test
     */
    public function filesAndDirectoriesReturnEmptyArrayWhenDirDoesNotExist(): void
    {
        $this->assertSame([], Directory::files($this->tempDir . "/missing"));
        $this->assertSame(
            [],
            Directory::directories($this->tempDir . "/missing"),
        );
    }

    /**
     * @test
     */
    public function countReturnsTotalItems(): void
    {
        File::save($this->tempDir . "/a.txt", "a");
        File::save($this->tempDir . "/b.txt", "b");
        Directory::create($this->subDir);

        $this->assertSame(3, Directory::count($this->tempDir));
    }

    /**
     * @test
     */
    public function isEmptyReturnsTrueForEmptyDirectory(): void
    {
        $this->assertTrue(Directory::isEmpty($this->tempDir));
    }

    /**
     * @test
     */
    public function isEmptyReturnsFalseWhenDirectoryHasContent(): void
    {
        File::save($this->tempDir . "/file.txt", "content");

        $this->assertFalse(Directory::isEmpty($this->tempDir));
    }

    /**
     * @test
     */
    public function cleanRemovesAllContentsButKeepsDirectory(): void
    {
        File::save($this->tempDir . "/file.txt", "content");
        Directory::create($this->subDir);
        File::save($this->subDir . "/nested.txt", "nested");

        $this->assertTrue(Directory::clean($this->tempDir));
        $this->assertTrue(Directory::has($this->tempDir));
        $this->assertTrue(Directory::isEmpty($this->tempDir));
    }

    /**
     * @test
     */
    public function deleteRemovesDirectoryCompletely(): void
    {
        File::save($this->tempDir . "/file.txt", "content");
        Directory::create($this->subDir);

        $this->assertTrue(Directory::delete($this->tempDir));
        $this->assertFalse(Directory::has($this->tempDir));
    }

    /**
     * @test
     */
    public function deleteReturnsFalseWhenDirectoryDoesNotExist(): void
    {
        $this->assertFalse(Directory::delete($this->tempDir . "/missing"));
    }

    /**
     * @test
     */
    public function copyDuplicatesDirectoryWithContents(): void
    {
        File::save($this->tempDir . "/file.txt", "content");
        Directory::create($this->subDir);
        File::save($this->subDir . "/nested.txt", "nested");

        $destination =
            sys_get_temp_dir() .
            DIRECTORY_SEPARATOR .
            "kitdash_copy_" .
            uniqid();

        $this->assertTrue(Directory::copy($this->tempDir, $destination));
        $this->assertTrue(Directory::has($destination));
        $this->assertTrue(
            File::has($destination . DIRECTORY_SEPARATOR . "file.txt"),
        );
        $this->assertTrue(
            Directory::has($destination . DIRECTORY_SEPARATOR . "subdir"),
        );
        $this->assertSame(
            "nested",
            File::get(
                $destination .
                    DIRECTORY_SEPARATOR .
                    "subdir" .
                    DIRECTORY_SEPARATOR .
                    "nested.txt",
            ),
        );

        $this->removeDirectory($destination);
    }

    /**
     * @test
     */
    public function moveRenamesOrMovesDirectory(): void
    {
        File::save($this->tempDir . "/file.txt", "content");

        $destination =
            sys_get_temp_dir() .
            DIRECTORY_SEPARATOR .
            "kitdash_moved_" .
            uniqid();

        $this->assertTrue(Directory::move($this->tempDir, $destination));
        $this->assertFalse(Directory::has($this->tempDir));
        $this->assertTrue(Directory::has($destination));
        $this->assertTrue(
            File::has($destination . DIRECTORY_SEPARATOR . "file.txt"),
        );

        $this->removeDirectory($destination);
    }

    /**
     * @test
     */
    public function sizeCalculatesTotalSizeOfFiles(): void
    {
        File::save($this->tempDir . "/a.txt", "12345"); // 5 bytes
        File::save($this->tempDir . "/b.txt", "1234567890"); // 10 bytes

        $this->assertSame(15, Directory::size($this->tempDir));
    }

    /**
     * @test
     */
    public function sizeIncludesNestedDirectories(): void
    {
        File::save($this->tempDir . "/root.txt", "1234"); // 4 bytes
        Directory::create($this->subDir);
        File::save($this->subDir . "/nested.txt", "123456"); // 6 bytes

        $this->assertSame(10, Directory::size($this->tempDir));
    }
}
