<?php

/**
 * @namespace
 */
namespace Kit;


/**
 * @package
 */
use Kit\Contracts\Interfaces\Array\Arr as Contract;



/**
 * Arr Util
 * @class
 */
class Arr implements Contract {
    /**
     * Constructor
     * @private
     */
    private function __construct() {}


    /**
     * Add an Element to an Array by Key & Value
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
     * Divide an Array to two arrays that provides Keys & Values
     * @method divide
     * @static
     * @param array $array
     * @return array
     */
    public static function divide(array $array): array {
        $keys = array_keys($array);;
        $values = array_values($array);

        return [$keys, $values];
    }

    /**
     * Remove an Element of an array by Key
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
     * Check to exist an Element in an array by Key
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
     * Get first Element value of an array
     * @method first
     * @static
     * @param array $array
     * @return mixed
     */
    public static function first(array $array): mixed {
        return current($array);
    }
}