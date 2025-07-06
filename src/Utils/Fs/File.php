<?php

namespace Kit\Utils\Fs;

use Kit\Contracts\Interfaces\Fs\File as IFile;


final class File implements IFile {
    public const ARCHIVE_FILE_EXT = ".zip";


    public static function save(string $file, mixed $data): bool {
        return @file_put_contents($file, $data);
    }

    public static function get(string $file): string|bool {
        if (!self::has($file)) return false;

        return @file_get_contents($file);
    }

    public static function has(string $file): bool {
        return file_exists($file);
    }
}