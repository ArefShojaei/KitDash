<?php

namespace Kit\Support\Interfaces\String;

interface Escapable
{
    public static function e(string $subject): string;
}
