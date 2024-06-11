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
    use HasValidation, HasConcatenation, HasCRUD;

    
    
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
     * Get Random Element of an array
     * @method random
     * @static
     * @param array $array
     * @return mixed  
     */
    public static function random(array $array): mixed {
        $randomKey = array_rand($array);

        return $array[$randomKey];
    }

    /**
     * Randomize Elements of an array
     * @method shuffle
     * @static
     * @param array $array
     * @return array
     */
    public static function shuffle(array $array): array {
        shuffle($array);
        
        return $array;
    }

    /**
     * Sort an Array by ASC
     * @method sort
     * @static
     * @param array $array
     * @return array
     */
    public static function sort(array $array): array {
        sort($array, SORT_ASC);

        return $array;
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
     * Merge Elements in an array
     * @method contact
     * @static
     * @param array $array
     * @param array $arrays
     * @return array
     */
    public static function contact(array $array, array ...$arrays): array {
        return array_merge_recursive($array, $arrays);
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