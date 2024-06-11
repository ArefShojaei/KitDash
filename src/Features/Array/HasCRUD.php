<?php

/**
 * @namespace
 */
namespace Kit\Features\Array;



/**
 * Has CRUD
 * @trait
 */
trait HasCRUD {
    /**
     * Add an Element to an Array by Key & Value
     * @see https://laravel.com/docs/11.x/helpers#method-array-add
     * @method add
     * @static
     * @param array $array
     * @param string $key
     * @param mixed $value
     * @return array
     */
    public static function add(array $array, string $key, mixed $value): array {
        $array[$key] = $value;

        return $array;
    }

    /**
     * Get Element of an array by Key
     * @see https://laravel.com/docs/11.x/helpers#method-array-get
     * @method get
     * @static
     * @param array $array
     * @param string $key
     * @return mixed
     */
    public static function get(array $array, string $key): mixed {
        return $array[$key] ?? null;
    }

    /**
     * Slice an Array by Length
     * @see https://laravel.com/docs/11.x/helpers#method-array-take
     * @method take
     * @static
     * @param array $array
     * @param int $length
     * @return array
     */
    public static function take(array $array, int $length): array {
        return array_slice($array, 0, $length);
    }

    /**
     * Get Element of an array by Index
     * @see https://lodash.info/doc/nth
     * @method nth
     * @static
     * @param array $array
     * @param int $index
     * @return mixed
     */
    public static function nth(array $array, int $index): mixed {
        return $array[$index] ?? null;
    }

    /**
     * Drop Element of an array by Index
     * @see https://lodash.info/doc/drop
     * @method drop
     * @static
     * @param array $array
     * @param int $index
     * @return array
     */
    public static function drop(array $array, int $index = null): array {
        $selfElementIndex = 1;
        
        if (!is_null($index)) return array_splice($array, $index, $selfElementIndex);
        

        array_shift($array);

        return $array;
    }

    /**
     * Remove falsey Elements of an array
     * @see https://lodash.info/doc/compact
     * @method compact
     * @static
     * @param array $array
     * @return array
     */
    public static function compact(array $array): array {
        return array_filter($array, fn($el) => $el == true);
    }

    /**
     * Remove an Element of an array by Key
     * @see https://laravel.com/docs/11.x/helpers#method-array-except
     * @method except
     * @static
     * @param array $array
     * @param string $key
     * @return array
     */
    public static function except(array $array, string $key): array {
        return array_filter($array, fn($value) => $array[$key] !== $value);
    }

    /**
     * Get first Element value of an array
     * @see https://laravel.com/docs/11.x/helpers#method-array-first
     * @method first
     * @static
     * @param array $array
     * @return mixed
     */
    public static function first(array $array): mixed {
        return current($array);
    }

    /**
     * Get last Element value of an array
     * @see https://laravel.com/docs/11.x/helpers#method-array-last
     * @method last
     * @static
     * @param array $array
     * @return mixed
     */
    public static function last(array $array): mixed {
        return end($array);
    }

    /**
     * Get filtered Elements of an Array by Keys
     * @see https://laravel.com/docs/11.x/helpers#method-array-only
     * @method only
     * @static
     * @param array $array
     * @param array $keys
     * @return array
     */
    public static function only(array $array, array $keys): array {
        $result = [];
        
        foreach ($keys as $key) {
            $value = $array[$key];

            $result[$key] = $value;
        }

        return $result;
    }

    /**
     * Fill Elements of an Array by Value
     * @see https://lodash.info/doc/fill
     * @method fill
     * @static
     * @param array $array
     * @param mixed $value
     * @return array
     */
    public static function fill(array $array, mixed $value): array {
        $minLength = 0;
        $arrayLength = count($array);
        
        return array_fill($minLength, $arrayLength, $value);
    }
}