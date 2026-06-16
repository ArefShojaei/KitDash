<?php

namespace Kit\Contracts\Interfaces;


interface Binary {
    public function encode(string $content): string;
    public function decode(string $binary): string;
}