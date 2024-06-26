<?php

/**
 * @namespace
 */
namespace Kit\Features\String;



/**
 * Has Modifiable
 * @trait
 */
trait HasModifiable {
    /**
     * Convert string to Upper case
     * @see https://laravel.com/docs/11.x/strings#method-str-upper
     * @method upper
     * @static
     * @param string $subject
     * @return string
     */
    public static function upper(string $subject): string {
        return strtoupper($subject);
    }

    /**
     * Convert string to Lower case
     * @see https://laravel.com/docs/11.x/strings#method-str-lower
     * @method upper
     * @static
     * @param string $subject
     * @return string
     */
    public static function lower(string $subject): string {
        return strtolower($subject);
    }
    
    /**
     * Convert first char of string to Lower-case
     * @see https://laravel.com/docs/11.x/strings#method-str-lcfirst
     * @method lcfirst
     * @static
     * @param string $subject
     * @return string
     */
    public static function lcfirst(string $subject): string {
        # Index
        $firstCharIndex = 0;

        # Char
        $firstChar = $subject[$firstCharIndex];

        return strtolower($firstChar) . substr($subject, $firstCharIndex + 1);
    }

    /**
     * Limit content of a string
     * @see https://laravel.com/docs/11.x/strings#method-str-limit
     * @method limit
     * @static
     * @param string $subject
     * @param int $length
     * @return string
     */
    public static function limit(string $subject, int $length): string {
        return substr($subject, 0, $length) . "...";
    }


    /**
     * Mask content of a string by Index
     * @see https://laravel.com/docs/11.x/strings#method-str-mask
     * @method mask
     * @static
     * @param string $subject
     * @param string $character
     * @param int $index
     * @return string
     */
    public static function mask(string $subject, string $character, int $index): string {
        # First Slice of string
        $base = substr($subject, 0, $index);

        # Second Slice of string
        $content = substr($subject, $index);

        # String length of the last slice
        $contentLength = strlen($content);


        return $base . str_repeat($character, $contentLength) ;
    }

    /**
     * Add padding both sides of a string
     * @see https://laravel.com/docs/11.x/strings#method-str-padboth
     * @method padBoth
     * @static
     * @param string $subject
     * @param int $length
     * @param string $character
     * @return string
     */
    public static function padBoth(string $subject, int $length, string $character = " "): string {
        return str_pad($subject, $length, $character, STR_PAD_BOTH);
    }

    /**
     * Add padding right side of a string
     * @see https://laravel.com/docs/11.x/strings#method-str-padright
     * @method padRight
     * @static
     * @param string $subject
     * @param int $length
     * @param string $character
     * @return string
     */
    public static function padRight(string $subject, int $length, string $character = " "): string {
        return str_pad($subject, $length, $character, STR_PAD_RIGHT);
    }

    /**
     * Add padding left side of a string
     * @see https://laravel.com/docs/11.x/strings#method-str-padleft
     * @method padLeft
     * @static
     * @param string $subject
     * @param int $length
     * @param string $character
     * @return string
     */
    public static function padLeft(string $subject, int $length, string $character = " "): string {
        return str_pad($subject, $length, $character, STR_PAD_LEFT);
    }

    /**
     * Remove character of a string
     * @see https://laravel.com/docs/11.x/strings#method-str-remove
     * @method remove
     * @static
     * @param string $character
     * @param string $subject
     * @return string
     */
    public static function remove(string $character, string $subject): string {
        $content = preg_replace_callback("/(?<character>{$character})/", function ($matches) {
            return null;
        }, $subject);

        return trim($content);
    }

    /**
     * Repeat string by Count
     * @see https://laravel.com/docs/11.x/strings#method-str-repeat
     * @method repeat
     * @static
     * @param string $subject
     * @param int $count
     * @return string
     */
    public static function repeat(string $subject, int $count): string {
        return str_repeat($subject, $count);
    }

    /**
     * Replace value in a string
     * @see https://laravel.com/docs/11.x/strings#method-str-replace
     * @method replace
     * @static
     * @param string|array $search
     * @param string|array $replace
     * @param string $subject
     * @return string
     */
    public static function replace(string|array $search, string|array $replace, string $subject): string {
        return str_replace($search, $replace, $subject);
    }

    /**
     * Reverse string
     * @see https://laravel.com/docs/11.x/strings#method-str-reverse
     * @method reverse
     * @static
     * @param string $subject
     * @return string
     */
    public static function reverse(string $subject): string {
        return strrev($subject);
    }

    /**
     * Add slug for URL
     * @see https://laravel.com/docs/11.x/strings#method-str-slug
     * @method slug
     * @static
     * @param string $subject
     * @param string $separator
     * @return string
     */
    public static function slug($subject, $separator = "-"): string {
        $parsedString = explode(" ", $subject);

        return implode($separator, $parsedString);
    }

    /**
     * Get center content in a string by between sentences
     * @see https://laravel.com/docs/11.x/strings#method-str-between
     * @method between
     * @static
     * @param string $subject
     * @param string $from
     * @param string $to
     * @return string
     */
    public static function between(string $subject, string $from, string $to): string {
        return str_replace([$from, $to], [null, null], $subject);
    }
}