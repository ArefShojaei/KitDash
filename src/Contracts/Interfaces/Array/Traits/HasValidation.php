<?php

/**
 * @namespace
 */
namespace Kit\Contracts\Interfaces\Array\Traits;



/**
 * Has Validation interface
 * @interface
 */
interface HasValidation {
    /**
     * Check to exist an Element in an array by Key
     * @method exists
     * @static
     * @param array $array
     * @param string $key
     * @return bool
     */
    public static function exists(array $array, string $key): bool;

    /**
     * Check to exist Element by Key
     * @method has
     * @static
     * @param array $array
     * @param string $key
     * @return bool
     */
    public static function has(array $array, string $key): bool;

    /**
     * Check to valid an Array as Assoc type
     * @method isAssoc
     * @static
     * @param array $array
     * @return bool
     */
    public static function isAssoc(array $array): bool;

    /**
     * Check to valid an Array as list type
     * @method isList
     * @static
     * @param array $array
     * @return bool
     */
    public static function isList(array $array): bool;
}