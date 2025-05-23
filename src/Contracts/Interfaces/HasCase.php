<?php

namespace Kit\Contracts\Interfaces;


interface HasCase {
    public static function title(string $subject): string;
    public static function snake(string $subject): string;
    public static function kebab(string $subject): string;
    public static function camel(string $subject): string;
    public static function headline(string $subject): string;
}