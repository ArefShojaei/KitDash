<?php

namespace Kit\Utils\Providers\Array;


trait HasValidation {
    /**
     * @see https://laravel.com/docs/11.x/helpers#method-array-exists
     */
    public static function exists(array $array, string $key): bool {
        return array_key_exists($key, $array);
    }

    /**
     * @see https://laravel.com/docs/11.x/helpers#method-array-has
     */
    public static function has(array $array, string $key): bool {
        return in_array($key, $array);
    }

    /**
     * @see https://laravel.com/docs/11.x/helpers#method-array-isassoc
     */
    public static function isAssoc(array $array): bool {
        $key = current(array_keys($array));

        return is_string($key) ? true : false;
    }

    /**
     * @see https://laravel.com/docs/11.x/helpers#method-array-islist
     */
    public static function isList(array $array): bool {
        $key = current(array_keys($array));

        return is_int($key) ? true : false;
    }
}