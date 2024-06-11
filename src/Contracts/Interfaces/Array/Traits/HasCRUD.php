<?php

/**
 * @namespace
 */
namespace Kit\Contracts\Interfaces\Array\Traits;



/**
 * Has CRUD interface
 * @interface
 */
interface HasCRUD {
    /**
     * Add an Element to an Array by Key & Value
     * @method add
     * @static
     * @param array $array
     * @param string $key
     * @param mixed $value
     * @return array
     */
    public static function add(array $array, string $key, mixed $value): array;

    /**
     * Get Element of an array by Key
     * @method get
     * @static
     * @param array $array
     * @param string $key
     * @return mixed
     */
    public static function get(array $array, string $key): mixed;

    /**
     * Slice an Array by Length
     * @method take
     * @static
     * @param array $array
     * @param int $length
     * @return array
     */
    public static function take(array $array, int $length): array;

    /**
     * Get Element of an array by Index
     * @method nth
     * @static
     * @param array $array
     * @param int $index
     * @return mixed
     */
    public static function nth(array $array, int $index): mixed;

    /**
     * Drop Element of an array by Index
     * @method drop
     * @static
     * @param array $array
     * @param int $index
     * @return array
     */
    public static function drop(array $array, int $index = null): array;

    /**
     * Remove falsey Elements of an array
     * @method compact
     * @static
     * @param array $array
     * @return array
     */
    public static function compact(array $array): array;

    /**
     * Remove an Element of an array by Key
     * @method except
     * @static
     * @param array $array
     * @param string $key
     * @return array
     */
    public static function except(array $array, string $key): array;

    /**
     * Get first Element value of an array
     * @method first
     * @static
     * @param array $array
     * @return mixed
     */
    public static function first(array $array): mixed;

    /**
     * Get last Element value of an array
     * @method last
     * @static
     * @param array $array
     * @return mixed
     */
    public static function last(array $array): mixed;

    /**
     * Get filtered Elements of an Array by Keys
     * @method only
     * @static
     * @param array $array
     * @param array $keys
     * @return array
     */
    public static function only(array $array, array $keys): array;

    /**
     * Fill Elements of an Array by Value
     * @method fill
     * @static
     * @param array $array
     * @param mixed $value
     * @return array
     */
    public static function fill(array $array, mixed $value): array;
}