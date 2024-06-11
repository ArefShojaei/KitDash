<?php

/**
 * @namespace
 */
namespace Kit;


/**
 * @package
 */
use Kit\Contracts\Interfaces\Array\Arr as Contract;
use Kit\Features\Array\{
    HasConcatenation,
    HasCRUD,
    HasRandom,
    HasSort,
    HasValidation
};




/**
 * Arr Util
 * @class
 */
class Arr implements Contract {
    /**
     * Import Traits
     */
    use HasValidation, HasConcatenation, HasCRUD, HasRandom, HasSort;

    
    
    /**
     * Constructor
     * @private
     */
    private function __construct() {}


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
     * Split an Array by Size
     * @method chunk
     * @static
     * @param array $array
     * @param int $size
     * @return array
     */
    public static function chunk(array $array, int $size): array {
        return array_chunk($array, $size);
    }

    /**
     * Get not included Elements of an array in another Array
     * @method difference
     * @static
     * @param array $array
     * @param array $with
     * @return array
     */
    public static function difference(array $array, array $with): array {
        return array_diff($array, $with);
    }

    /**
     * Get unique Array
     * @method unique
     * @static
     * @param array $array
     * @return array
     */
    public static function unique(array $array): array {
        return array_unique($array);
    }
}