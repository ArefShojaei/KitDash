<?php

namespace Kit\Utils\Fs;

use Kit\Contracts\Interfaces\Fs\Directory as IDirectory;


final class Directory implements IDirectory {
    public static function create(string $path): bool {
        return mkdir($path, recursive:true);
    }

    public static function has(string $path): bool {
        return is_dir($path);
    }
}