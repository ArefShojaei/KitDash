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
    HasSort,
    HasValidation
};




/**
 * Array interface
 * @interface
 */
interface Arr extends HasValidation, HasConcatenation, HasCRUD, HasRandom, HasSort {
    /**
     * Divide an Array to two arrays that provides Keys & Values
     * @method divide
     * @static
     * @param array $array
     * @return array
     */
    public static function divide(array $array): array;

    /**
     * Split an Array by Size
     * @method chunk
     * @static
     * @param array $array
     * @param int $size
     * @return array
     */
    public static function chunk(array $array, int $size): array;

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