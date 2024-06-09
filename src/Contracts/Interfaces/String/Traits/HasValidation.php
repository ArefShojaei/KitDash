<?php

/**
 * @namespace
 */
namespace Kit\Contracts\Interfaces\String\Trait;



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
}