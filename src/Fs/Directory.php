<?php

namespace Kit\Fs;

use Kit\Fs\Interfaces\Directory as IDirectory;

final class Directory implements IDirectory
{
    public static function has(string $directory): bool
    {
        return is_dir($directory);
    }

    public static function create(
        string $directory,
        int $permissions = 0755,
    ): bool {
        return self::has($directory) || mkdir($directory, $permissions, true);
    }

    public static function delete(string $directory): bool
    {
        if (!self::has($directory)) {
            return false;
        }

        foreach (self::files($directory) as $file) {
            unlink($file);
        }

        foreach (array_reverse(self::directories($directory)) as $dir) {
            rmdir($dir);
        }

        return rmdir($directory);
    }

    public static function files(string $directory): array
    {
        if (!self::has($directory)) {
            return [];
        }

        return array_values(
            array_filter(
                glob($directory . DIRECTORY_SEPARATOR . "*") ?: [],
                "is_file",
            ),
        );
    }

    public static function directories(string $directory): array
    {
        if (!self::has($directory)) {
            return [];
        }

        return array_values(
            array_filter(
                glob($directory . DIRECTORY_SEPARATOR . "*") ?: [],
                "is_dir",
            ),
        );
    }

    public static function copy(string $source, string $destination): bool
    {
        if (!self::has($source)) {
            return false;
        }

        self::create($destination);

        foreach (self::files($source) as $file) {
            copy($file, $destination . DIRECTORY_SEPARATOR . basename($file));
        }

        foreach (self::directories($source) as $directory) {
            self::copy(
                $directory,
                $destination . DIRECTORY_SEPARATOR . basename($directory),
            );
        }

        return true;
    }

    public static function move(string $source, string $destination): bool
    {
        return self::has($source) && rename($source, $destination);
    }

    public static function clean(string $directory): bool
    {
        if (!self::has($directory)) {
            return false;
        }

        foreach (self::files($directory) as $file) {
            unlink($file);
        }

        foreach (self::directories($directory) as $dir) {
            self::delete($dir);
        }

        return true;
    }

    public static function count(string $directory): int
    {
        return count(self::files($directory)) +
            count(self::directories($directory));
    }

    public static function size(string $directory): int
    {
        $size = 0;

        foreach (self::files($directory) as $file) {
            $size += filesize($file);
        }

        foreach (self::directories($directory) as $dir) {
            $size += self::size($dir);
        }

        return $size;
    }

    public static function isEmpty(string $directory): bool
    {
        return self::count($directory) === 0;
    }
}
