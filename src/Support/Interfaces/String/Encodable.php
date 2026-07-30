<?php

namespace Kit\Support\Interfaces\String;

interface Encodable
{
    public static function toBase64(string $subject): string;
}
