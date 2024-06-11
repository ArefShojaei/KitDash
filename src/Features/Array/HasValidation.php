<?php

/**
 * @namespace
 */
namespace Kit\Features\Array;



/**
 * Has Validation
 * @trait
 */
trait HasValidation {
    /**
     * Check to exist an Element in an array by Key
     * @see https://laravel.com/docs/11.x/helpers#method-array-exists
     * @method exists
     * @static
     * @param array $array
     * @param string $key
     * @return bool
     */
    public static function exists(array $array, string $key): bool {
        return array_key_exists($key, $array);
    }

    /**
     * Check to exist Element by Key
     * @see https://laravel.com/docs/11.x/helpers#method-array-has
     * @method has
     * @static
     * @param array $array
     * @param string $key
     * @return bool
     */
    public static function has(array $array, string $key): bool {
        return in_array($key, $array);
    }

    /**
     * Check to valid an Array as Assoc type
     * @see https://laravel.com/docs/11.x/helpers#method-array-isassoc
     * @method isAssoc
     * @static
     * @param array $array
     * @return bool
     */
    public static function isAssoc(array $array): bool {
        $key = current(array_keys($array));

        return is_string($key) ? true : false;
    }

    /**
     * Check to valid an Array as list type
     * @see https://laravel.com/docs/11.x/helpers#method-array-islist
     * @method isList
     * @static
     * @param array $array
     * @return bool
     */
    public static function isList(array $array): bool {
        $key = current(array_keys($array));

        return is_int($key) ? true : false;
    }
}