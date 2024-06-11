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
    HasUnique,
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
        HasCompareable, HasUnique;

    
    
    /**
     * Constructor
     * @private
     */
    private function __construct() {}
}