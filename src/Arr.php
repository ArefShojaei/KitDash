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
}