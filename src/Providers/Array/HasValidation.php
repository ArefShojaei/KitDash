<?php

namespace Kit\Providers\Array;


trait HasValidation {
    /**
     * Check to exist an Element in an array by Key
     * @see https://laravel.com/docs/11.x/helpers#method-array-exists
     */
    public static function exists(array $array, string $key): bool {
        return array_key_exists($key, $array);
    }

    /**
     * Check to exist Element by Key
     * @see https://laravel.com/docs/11.x/helpers#method-array-has
     */
    public static function has(array $array, string $key): bool {
        return in_array($key, $array);
    }

    /**
     * Check to valid an Array as Assoc type
     * @see https://laravel.com/docs/11.x/helpers#method-array-isassoc
     */
    public static function isAssoc(array $array): bool {
        $key = current(array_keys($array));

        return is_string($key) ? true : false;
    }

    /**
     * Check to valid an Array as list type
     * @see https://laravel.com/docs/11.x/helpers#method-array-islist
     */
    public static function isList(array $array): bool {
        $key = current(array_keys($array));

        return is_int($key) ? true : false;
    }
}