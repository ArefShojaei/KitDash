<?php

/**
 * @namespace
 */
namespace Kit\Contracts\Interfaces\Array;


/**
 * @package
 */
use Kit\Contracts\Interfaces\Array\Traits\{
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
interface Arr extends HasValidation, HasConcatenation, HasCRUD, HasRandom, HasSort, HasSeparator {
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
     * Get unique Array
     * @method unique
     * @static
     * @param array $array
     * @return array
     */
    public static function unique(array $array): array;
}