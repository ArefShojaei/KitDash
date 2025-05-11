<?php

namespace Kit\Contracts\Interfaces;


interface HasEscapeable {
    public static function e(string $subject): string;
}
