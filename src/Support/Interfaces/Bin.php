<?php

namespace Kit\Support\Interfaces;

interface Bin
{
    public function encode(string $content): string;

    public function decode(string $binary): string;
}
