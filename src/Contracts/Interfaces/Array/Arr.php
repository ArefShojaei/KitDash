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
}