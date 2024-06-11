<?php

/**
 * @namespace
 */
namespace Kit\Contracts\Interfaces\Array;


/**
 * @package
 */
use Kit\Contracts\Interfaces\Array\Traits\{
    HasCompareable,
    HasConcatenation,
    HasCRUD,
    HasRandom,
    HasSeparator,
    HasSort,
    HasValidation
};




/**
 * Array interface
 * @interface
 */
interface Arr extends HasValidation, HasConcatenation, HasCRUD, HasRandom, HasSort, HasSeparator, HasCompareable {
    /**
     * Get unique Array
     * @method unique
     * @static
     * @param array $array
     * @return array
     */
    public static function unique(array $array): array;
}