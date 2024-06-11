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
    HasCompareable,
    HasConcatenation,
    HasCRUD,
    HasRandom,
    HasSeparator,
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
    use HasValidation, HasConcatenation, HasCRUD, 
        HasRandom, HasSort, HasSeparator,
        HasCompareable;

    
    
    /**
     * Constructor
     * @private
     */
    private function __construct() {}


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