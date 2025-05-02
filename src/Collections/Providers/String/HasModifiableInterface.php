<?php

namespace Kit\Collections\Providers\String;


interface HasModifiableInterface {
    public static function upper(string $subject): string;
    public static function lower(string $subject): string;
    public static function lcfirst(string $subject): string;
    public static function mask(string $subject, string $character, int $index): string;
    public static function padBoth(string $subject, int $length, string $character = " "): string;
    public static function padRight(string $subject, int $length, string $character = " "): string;
    public static function padLeft(string $subject, int $length, string $character = " "): string;
    public static function replace(string|array $search, string|array $replace, string $subject): string;
    public static function reverse(string $subject): string;
    public static function slug($subject, $separator = "-"): string;
    public static function limit(string $subject, int $length): string;
    public static function remove(string $character, string $subject): string;
    public static function repeat(string $subject, int $count): string;
    public static function between(string $subject, string $from, string $to): string;
}
