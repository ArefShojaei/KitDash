<?php

namespace Kit\Contracts\Interfaces;


interface HasSearchable {
    public static function charAt(string $subject, int $index): string;
    public static function position(string $subject, string $search): string;
    public static function after(string $subject, string $search): string;
    public static function before(string $subject, string $search): string;
    public static function classBaseName(string $namespace): string;
    public static function substr(string $subject, int $offset, int $length): string;
}
