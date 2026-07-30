<?php

namespace Kit\Fs\Interfaces;

interface Directory
{
    public static function has(string $directory): bool;

    public static function create(
        string $directory,
        int $permissions = 0755,
    ): bool;

    public static function delete(string $directory): bool;

    public static function files(string $directory): array;

    public static function directories(string $directory): array;

    public static function copy(string $source, string $destination): bool;

    public static function move(string $source, string $destination): bool;

    public static function clean(string $directory): bool;

    public static function count(string $directory): int;

    public static function size(string $directory): int;

    public static function isEmpty(string $directory): bool;
}
