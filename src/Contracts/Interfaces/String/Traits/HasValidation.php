<?php

/**
 * @namespace
 */
namespace Kit\Contracts\Interfaces\String\Traits;



/**
 * Has Validation interface
 * @interface
 */
interface HasValidation {
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
     * Check to empty a string
     * @method isEmpty
     * @static
     * @param string $subject
     * @return bool
     */
    public static function isEmpty(string $subject): bool;

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
}