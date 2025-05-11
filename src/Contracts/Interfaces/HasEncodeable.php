<?php

namespace Kit\Contracts\Interfaces;


interface HasEncodeable {
    public static function toBase64(string $subject): string;
}