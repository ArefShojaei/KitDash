<?php

namespace Kit\Providers\String;


interface HasValidationInterface {
    public static function isJSON(string $json): bool;
    public static function isURL(string $url): bool;
    public static function isEmpty(string $subject): bool;
    public static function contains(string $subject, string $search): bool;
    public static function containsAll(string $subject, array $search): bool;
    public static function endsWith(string $subject, string $search): bool;
    public static function startsWith(string $subject, string $search): bool;
}
