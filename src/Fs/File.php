<?php

namespace Kit\Fs;

use Kit\Fs\Interfaces\File as IFile;

final class File implements IFile
{
    public static function has(string $file): bool
    {
        return is_file($file);
    }

    public static function get(string $file): string|false
    {
        return self::has($file) ? file_get_contents($file) : false;
    }

    public static function save(string $file, mixed $data): bool
    {
        return file_put_contents($file, (string) $data) !== false;
    }

    public static function append(string $file, mixed $data): bool
    {
        return file_put_contents($file, (string) $data, FILE_APPEND) !== false;
    }

    public static function delete(string $file): bool
    {
        return self::has($file) && unlink($file);
    }

    public static function copy(string $source, string $destination): bool
    {
        return self::has($source) && copy($source, $destination);
    }

    public static function move(string $source, string $destination): bool
    {
        return self::has($source) && rename($source, $destination);
    }

    public static function rename(string $file, string $name): bool
    {
        if (!self::has($file)) {
            return false;
        }

        $destination = dirname($file) . DIRECTORY_SEPARATOR . $name;

        return rename($file, $destination);
    }

    public static function size(string $file): int|false
    {
        return self::has($file) ? filesize($file) : false;
    }

    public static function extension(string $file): string
    {
        return pathinfo($file, PATHINFO_EXTENSION);
    }

    public static function mime(string $file): string|false
    {
        return self::has($file) ? mime_content_type($file) : false;
    }

    public static function hash(
        string $file,
        string $algorithm = "sha256",
    ): string|false {
        return self::has($file) ? hash_file($algorithm, $file) : false;
    }

    public static function name(string $file): string
    {
        return pathinfo($file, PATHINFO_FILENAME);
    }

    public static function dirname(string $file): string
    {
        return dirname($file);
    }

    public static function modified(string $file): int|false
    {
        return self::has($file) ? filemtime($file) : false;
    }
}
