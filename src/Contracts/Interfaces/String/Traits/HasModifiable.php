<?php

/**
 * @namespace
 */
namespace Kit\Contracts\Interfaces\String\Traits;



/**
 * Has Modifiable interface
 * @interface
 */
interface HasModifiable {
    /**
     * Convert string to Upper case
     * @method upper
     * @static
     * @param string $subject
     * @return string
     */
    public static function upper(string $subject): string;

    /**
     * Convert string to Lower case
     * @method upper
     * @static
     * @param string $subject
     * @return string
     */
    public static function lower(string $subject): string;

    /**
     * Convert first char of string to Lower-case
     * @method lcfirst
     * @static
     * @param string $subject
     * @return string
     */
    public static function lcfirst(string $subject): string;

    /**
     * Mask content of a string by Index
     * @method mask
     * @static
     * @param string $subject
     * @param string $character
     * @param int $index
     * @return string
     */
    public static function mask(string $subject, string $character, int $index): string;

    /**
     * Add padding both sides of a string
     * @method padBoth
     * @static
     * @param string $subject
     * @param int $length
     * @param string $character
     * @return string
     */
    public static function padBoth(string $subject, int $length, string $character = " "): string;

    /**
     * Add padding right side of a string
     * @method padRight
     * @static
     * @param string $subject
     * @param int $length
     * @param string $character
     * @return string
     */
    public static function padRight(string $subject, int $length, string $character = " "): string;

    /**
     * Add padding left side of a string
     * @method padLeft
     * @static
     * @param string $subject
     * @param int $length
     * @param string $character
     * @return string
     */
    public static function padLeft(string $subject, int $length, string $character = " "): string;

    /**
     * Replace value in a string
     * @method replace
     * @static
     * @param string|array $search
     * @param string|array $replace
     * @param string $subject
     * @return string
     */
    public static function replace(string|array $search, string|array $replace, string $subject): string;

    /**
     * Reverse string
     * @method reverse
     * @static
     * @param string $subject
     * @return string
     */
    public static function reverse(string $subject): string;

    /**
     * Add slug for URL
     * @method slug
     * @static
     * @param string $subject
     * @param string $separator
     * @return string
     */
    public static function slug($subject, $separator = "-"): string;

        /**
     * Limit content of a string
     * @method limit
     * @static
     * @param string $subject
     * @param int $length
     * @return string
     */
    public static function limit(string $subject, int $length): string;

    /**
     * Remove character of a string
     * @method remove
     * @static
     * @param string $character
     * @param string $subject
     * @return string
     */
    public static function remove(string $character, string $subject): string;

    /**
     * Repeat string by Count
     * @method repeat
     * @static
     * @param string $subject
     * @param int $count
     * @return string
     */
    public static function repeat(string $subject, int $count): string;

    /**
     * Get center content in a string by between sentences
     * @method between
     * @static
     * @param string $subject
     * @param string $from
     * @param string $to
     * @return string
     */
    public static function between(string $subject, string $from, string $to): string;
}