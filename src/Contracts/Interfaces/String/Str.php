<?php

/**
 * @namespace
 */
namespace Kit\Contracts\Interfaces\String;



/**
 * String interface
 * @interface
 */
interface Str {
    /**
     * Convert special characters
     * @param string $subject
     * @return string
     */
    public static function e(string $subject): string;

    /**
     * Get string after a Word or Sentence
     * @method after
     * @static
     * @param string $subject
     * @param string $search
     * @return string
     */
    public static function after(string $subject, string $search): string;

    /**
     * Get string before a Word or Sentence
     * @method before
     * @static
     * @param string $subject
     * @param string $search
     * @return string
     */
    public static function before(string $subject, string $search): string;

    /**
     * Get Class name in a namespace as string
     * @method classBaseName
     * @static
     * @param string $namespace
     * @return string
     */
    public static function classBaseName(string $namespace): string;

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
     * Convert Snake-case to Camel-case
     * @method camel
     * @static
     * @param string $subject
     * @return string
     */
    public static function camel(string $subject): string;

    /**
     * Get word of string by Index
     * @method charAt
     * @static
     * @param string $subject
     * @param int $index
     * @return string
     */
    public static function charAt(string $subject, int $index): string;

    /**
     * Check to exist a Word in a string
     * @method contains
     * @static
     * @param string $subject
     * @param string $search
     * @return bool
     */
    public static function contains(string $subject, string $search): bool;

        /**
     * Check to exist all Words in a string 
     * @method containsAll
     * @static
     * @param string $subject
     * @param array $search
     * @return bool
     */
    public static function containsAll(string $subject, array $search): bool;

    /**
     * Check a string that ends with a Word
     * @method endsWith
     * @static
     * @param string $subject
     * @param string $search
     * @return bool
     */
    public static function endsWith(string $subject, string $search): bool;

    /**
     * Check a string that starts with a Word
     * @method startsWith
     * @static
     * @param string $subject
     * @param string $search
     * @return bool
     */
    public static function startsWith(string $subject, string $search): bool;

    /**
     * Convert Pascal-case to Title-case
     * @method headline
     * @static
     * @param string $subject
     * @return string
     */
    public static function headline(string $subject): string;

    /**
     * Check to valid JSON type
     * @method isJSON
     * @static
     * @param string $json
     * @return bool
     */
    public static function isJSON(string $json): bool;

    /**
     * Check to valid URL
     * @method isURL
     * @static
     * @param string $url
     * @return bool
     */
    public static function isURL(string $url): bool;

    /**
     * Convert Snake-case to Kebab-case
     * @method kebab
     * @static
     * @param string $subject
     * @return string
     */
    public static function kebab(string $subject): string;

    /**
     * Get string length
     * @method length
     * @static
     * @param string $subject
     * @return int
     */
    public static function length(string $subject): int;
}