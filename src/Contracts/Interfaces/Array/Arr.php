<?php

/**
 * @namespace
 */
namespace Kit\Contracts\Interfaces\Array;



/**
 * Array interface
 * @interface
 */
interface Arr {
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
     * Divide an Array to two arrays that provides Keys & Values
     * @method divide
     * @static
     * @param array $array
     * @return array
     */
    public static function divide(array $array): array;

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
     * Check to exist an Element in an array by Key
     * @method exists
     * @static
     * @param array $array
     * @param string $key
     * @return bool
     */
    public static function exists(array $array, string $key): bool;

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
     * Get Element of an array by Key
     * @method get
     * @static
     * @param array $array
     * @param string $key
     * @return mixed
     */
    public static function get(array $array, string $key): mixed;

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

    /**
     * Join Elements together by Separator
     * @method join
     * @static
     * @param array $array
     * @param string $separator
     * @return string
     */
    public static function join(array $array, string $separator = ", "): string;

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
     * Get Random Element of an array
     * @method random
     * @static
     * @param array $array
     * @return mixed  
     */
    public static function random(array $array): mixed;

    /**
     * Randomize Elements of an array
     * @method shuffle
     * @static
     * @param array $array
     * @return array
     */
    public static function shuffle(array $array): array;

    /**
     * Sort an Array by ASC
     * @method sort
     * @static
     * @param array $array
     * @return array
     */
    public static function sort(array $array): array;

    /**
     * Split an Array by Size
     * @method chunk
     * @static
     * @param array $array
     * @param int $size
     * @return array
     */
    public static function chunk(array $array, int $size): array;

    /**
     * Remove falsey Elements of an array
     * @method compact
     * @static
     * @param array $array
     * @return array
     */
    public static function compact(array $array): array;

    /**
     * Merge Elements in an array
     * @method contact
     * @static
     * @param array $array
     * @param array $arrays
     * @return array
     */
    public static function contact(array $array, array ...$arrays): array;

    /**
     * Get not included Elements of an array in another Array
     * @method difference
     * @static
     * @param array $array
     * @param array $with
     * @return array
     */
    public static function difference(array $array, array $with): array;

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
     * Fill Elements of an Array by Value
     * @method fill
     * @static
     * @param array $array
     * @param mixed $value
     * @return array
     */
    public static function fill(array $array, mixed $value): array;
}