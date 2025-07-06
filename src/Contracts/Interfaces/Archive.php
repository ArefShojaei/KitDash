<?php

namespace Kit\Contracts\Interfaces;


interface Archive {
    public function addFile(string $file, string $name = null): bool;
    public function addComment(string $message): bool;
    public function save(): bool;
}