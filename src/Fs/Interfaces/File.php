<?php

namespace Kit\Fs\Interfaces;

interface File
{
    public static function has(string $file): bool;

    public static function get(string $file): string|false;

    public static function save(string $file, mixed $data): bool;

    public static function append(string $file, mixed $data): bool;

    public static function delete(string $file): bool;

    public static function copy(string $source, string $destination): bool;

    public static function move(string $source, string $destination): bool;

    public static function rename(string $file, string $name): bool;

    public static function size(string $file): int|false;

    public static function extension(string $file): string;

    public static function mime(string $file): string|false;

    public static function hash(
        string $file,
        string $algorithm = "sha256",
    ): string|false;

    public static function name(string $file): string;

    public static function dirname(string $file): string;

    public static function modified(string $file): int|false;
}
