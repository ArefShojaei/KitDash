<?php

namespace Kit\Fs\Interfaces;

interface Archive
{
    public function addFile(string $file, ?string $name = null): bool;

    public function addFromString(string $name, string $contents): bool;

    public function addDirectory(string $directory, string $path = ""): bool;

    public function extract(string $destination): bool;

    public function comment(string $message): bool;

    public function count(): int;

    public function close(): bool;
}
