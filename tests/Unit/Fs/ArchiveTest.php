<?php

namespace Tests\Unit\Fs;

use ZipArchive;

use PHPUnit\Framework\TestCase;

use Kit\Fs\{Archive, File, Directory};
use Kit\Fs\Interfaces\Archive as IArchive;

final class ArchiveTest extends TestCase
{
    private string $tempDir;
    private string $zipFile;
    private string $extractDir;

    protected function setUp(): void
    {
        $this->tempDir =
            sys_get_temp_dir() .
            DIRECTORY_SEPARATOR .
            "kitdash_archive_" .
            uniqid();
        $this->zipFile = $this->tempDir . DIRECTORY_SEPARATOR . "test.zip";
        $this->extractDir = $this->tempDir . DIRECTORY_SEPARATOR . "extracted";

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
        $items = glob($dir . DIRECTORY_SEPARATOR . "{*,.*}", GLOB_BRACE) ?: [];

        foreach ($items as $item) {
            if (basename($item) === "." || basename($item) === "..") {
                continue;
            }

            if (is_dir($item)) {
                $this->removeDirectory($item);
            } else {
                @unlink($item);
            }
        }

        @rmdir($dir);
    }

    /**
     * @test
     */
    public function isImplementedArchiveInterface(): void
    {
        $interfaces = class_implements(Archive::class);

        $this->assertIsArray($interfaces);
        $this->assertArrayHasKey(IArchive::class, $interfaces);
    }

    /**
     * @test
     */
    public function createArchiveInstance(): IArchive
    {
        $archive = new Archive($this->zipFile);

        $this->assertInstanceOf(Archive::class, $archive);
        $this->assertInstanceOf(IArchive::class, $archive);

        $archive->close();

        return $archive;
    }

    /**
     * @test
     */
    public function addFileToArchive(): void
    {
        $sourceFile = $this->tempDir . DIRECTORY_SEPARATOR . "sample.txt";
        File::save($sourceFile, "Hello from KitDash");

        $archive = new Archive($this->zipFile);
        $result = $archive->addFile($sourceFile);
        $archive->close();

        $this->assertTrue($result);
        $this->assertTrue(File::has($this->zipFile));
    }

    /**
     * @test
     */
    public function addFileWithCustomName(): void
    {
        $sourceFile = $this->tempDir . DIRECTORY_SEPARATOR . "sample.txt";
        File::save($sourceFile, "content");

        $archive = new Archive($this->zipFile);
        $archive->addFile($sourceFile, "custom/path/renamed.txt");
        $count = $archive->count();
        $archive->close();

        $this->assertSame(1, $count);
    }

    /**
     * @test
     */
    public function addFromString(): void
    {
        $archive = new Archive($this->zipFile);
        $result = $archive->addFromString(
            "readme.txt",
            "This is generated content",
        );
        $count = $archive->count();
        $archive->close();

        $this->assertTrue($result);
        $this->assertSame(1, $count);
    }

    /**
     * @test
     */
    public function addDirectoryRecursively(): void
    {
        $sourceDir = $this->tempDir . DIRECTORY_SEPARATOR . "source";
        Directory::create($sourceDir);
        Directory::create($sourceDir . "/sub");

        File::save($sourceDir . "/file1.txt", "one");
        File::save($sourceDir . "/sub/file2.txt", "two");

        $archive = new Archive($this->zipFile);
        $result = $archive->addDirectory($sourceDir);
        $count = $archive->count();
        $archive->close();

        $this->assertTrue($result);
        $this->assertGreaterThanOrEqual(2, $count);
    }

    /**
     * @test
     */
    public function extractArchive(): void
    {
        $archive = new Archive($this->zipFile);
        $archive->addFromString("hello.txt", "extracted content");
        $archive->close();

        $archive = new Archive($this->zipFile);
        $result = $archive->extract($this->extractDir);
        $archive->close();

        $this->assertTrue($result);
        $this->assertTrue(
            File::has($this->extractDir . DIRECTORY_SEPARATOR . "hello.txt"),
        );
        $this->assertSame(
            "extracted content",
            File::get($this->extractDir . DIRECTORY_SEPARATOR . "hello.txt"),
        );
    }

    /**
     * @test
     */
    public function setArchiveComment(): void
    {
        $archive = new Archive($this->zipFile);
        $archive->addFromString("file.txt", "content");
        $result = $archive->comment("Created by KitDash");
        $archive->close();

        $this->assertTrue($result);

        $zip = new ZipArchive();
        $zip->open($this->zipFile);
        $this->assertSame("Created by KitDash", $zip->getArchiveComment());
        $zip->close();
    }

    /**
     * @test
     */
    public function countReturnsNumberOfFilesInArchive(): void
    {
        $archive = new Archive($this->zipFile);
        $archive->addFromString("a.txt", "a");
        $archive->addFromString("b.txt", "b");
        $archive->addFromString("c.txt", "c");

        $this->assertSame(3, $archive->count());
        $archive->close();
    }

    /**
     * @test
     */
    public function closeFinalizesArchive(): void
    {
        $archive = new Archive($this->zipFile);
        $archive->addFromString("test.txt", "data");

        $this->assertTrue($archive->close());
        $this->assertTrue(File::has($this->zipFile));
        $this->assertGreaterThan(0, File::size($this->zipFile));
    }

    /**
     * @test
     */
    public function fullWorkflowCreateAddExtract(): void
    {
        $archive = new Archive($this->zipFile);
        $archive->addFromString("config.json", '{"app":"KitDash"}');
        $archive->addFromString("notes/readme.md", "# Hello");
        $archive->comment("Test archive");
        $archive->close();

        $this->assertTrue(File::has($this->zipFile));

        $archive = new Archive($this->zipFile);
        $archive->extract($this->extractDir);
        $archive->close();

        $this->assertTrue(File::has($this->extractDir . "/config.json"));
        $this->assertTrue(File::has($this->extractDir . "/notes/readme.md"));
        $this->assertSame(
            '{"app":"KitDash"}',
            File::get($this->extractDir . "/config.json"),
        );
        $this->assertSame(
            "# Hello",
            File::get($this->extractDir . "/notes/readme.md"),
        );
    }
}
