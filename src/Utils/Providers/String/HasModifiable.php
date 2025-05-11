<?php

namespace Kit\Utils\Providers\String;


trait HasModifiable {
    /**
     * @see https://laravel.com/docs/11.x/strings#method-str-upper
     */
    public static function upper(string $subject): string {
        return strtoupper($subject);
    }

    /**
     * @see https://laravel.com/docs/11.x/strings#method-str-lower
     */
    public static function lower(string $subject): string {
        return strtolower($subject);
    }

    /**
     * Convert first char of string to Lower-case
     * @see https://laravel.com/docs/11.x/strings#method-str-lcfirst
     */
    public static function lcfirst(string $subject): string {
        # Index
        $firstCharIndex = 0;

        # Char
        $firstChar = $subject[$firstCharIndex];

        return strtolower($firstChar) . substr($subject, $firstCharIndex + 1);
    }

    /**
     * @see https://laravel.com/docs/11.x/strings#method-str-limit
     */
    public static function limit(string $subject, int $length): string {
        return substr($subject, 0, $length) . "...";
    }


    /**
     * Mask content of a string by Index
     * @see https://laravel.com/docs/11.x/strings#method-str-mask
     */
    public static function mask(string $subject, string $character, int $index): string {
        # First Slice of string
        $base = substr($subject, 0, $index);

        # Second Slice of string
        $content = substr($subject, $index);

        # String length of the last slice
        $contentLength = strlen($content);


        return $base . str_repeat($character, $contentLength);
    }

    /**
     * Add padding both sides of a string
     * @see https://laravel.com/docs/11.x/strings#method-str-padboth
     */
    public static function padBoth(string $subject, int $length, string $character = " "): string {
        return str_pad($subject, $length, $character, STR_PAD_BOTH);
    }

    /**
     * Add padding right side of a string
     * @see https://laravel.com/docs/11.x/strings#method-str-padright
     */
    public static function padRight(string $subject, int $length, string $character = " "): string {
        return str_pad($subject, $length, $character, STR_PAD_RIGHT);
    }

    /**
     * Add padding left side of a string
     * @see https://laravel.com/docs/11.x/strings#method-str-padleft
     */
    public static function padLeft(string $subject, int $length, string $character = " "): string {
        return str_pad($subject, $length, $character, STR_PAD_LEFT);
    }

    /**
     * Remove character of a string
     * @see https://laravel.com/docs/11.x/strings#method-str-remove
     */
    public static function remove(string $character, string $subject): string {
        $content = preg_replace_callback("/(?<character>{$character})/", function ($matches) {
            return null;
        }, $subject);

        return trim($content);
    }

    /**
     * @see https://laravel.com/docs/11.x/strings#method-str-repeat
     */
    public static function repeat(string $subject, int $count): string {
        return str_repeat($subject, $count);
    }

    /**
     * @see https://laravel.com/docs/11.x/strings#method-str-replace
     */
    public static function replace(string|array $search, string|array $replace, string $subject): string {
        return str_replace($search, $replace, $subject);
    }

    /**
     * @see https://laravel.com/docs/11.x/strings#method-str-reverse
     */
    public static function reverse(string $subject): string {
        return strrev($subject);
    }

    /**
     * Add slug for URL
     * @see https://laravel.com/docs/11.x/strings#method-str-slug
     */
    public static function slug($subject, $separator = "-"): string {
        $parsedString = explode(" ", $subject);

        return implode($separator, $parsedString);
    }

    /**
     * Get center content in a string by between sentences
     * @see https://laravel.com/docs/11.x/strings#method-str-between
     */
    public static function between(string $subject, string $from, string $to): string {
        return str_replace([$from, $to], [null, null], $subject);
    }
}