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
}