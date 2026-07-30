<?php

namespace Kit\Net\Interfaces;

interface Url
{
    public static function create(string $url): self;

    public function href(): string;

    public function host(): string;

    public function domain(): string;

    public function origin(): string;

    public function path(): ?string;

    public function protocol(): string;

    public function query(): array;
}
