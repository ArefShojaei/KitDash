<?php

namespace Kit\Fs;

use ZipArchive;

use Kit\Fs\Interfaces\Archive as IArchive;

final class Archive implements IArchive
{
    public const EXTENSION = "zip";

    private readonly ZipArchive $zip;

    public function __construct(string $file)
    {
        $this->zip = new ZipArchive();

        $this->zip->open($file, ZipArchive::CREATE);
    }

    public function addFile(string $file, ?string $name = null): bool
    {
        return $this->zip->addFile($file, $name ?? basename($file));
    }

    public function addFromString(string $name, string $contents): bool
    {
        return $this->zip->addFromString($name, $contents);
    }

    public function addDirectory(string $directory, string $path = ""): bool
    {
        $path = trim($path, "/");

        foreach (glob($directory . "/*") ?: [] as $item) {
            $name =
                $path === "" ? basename($item) : $path . "/" . basename($item);

            if (is_dir($item)) {
                $this->zip->addEmptyDir($name);

                $this->addDirectory($item, $name);

                continue;
            }

            $this->zip->addFile($item, $name);
        }

        return true;
    }

    public function extract(string $destination): bool
    {
        return $this->zip->extractTo($destination);
    }

    public function comment(string $message): bool
    {
        return $this->zip->setArchiveComment($message);
    }

    public function count(): int
    {
        return $this->zip->numFiles;
    }

    public function close(): bool
    {
        return $this->zip->close();
    }
}
