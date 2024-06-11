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
    HasValidation
};




/**
 * Array interface
 * @interface
 */
interface Arr extends HasValidation, HasConcatenation, HasCRUD {
    /**
     * Divide an Array to two arrays that provides Keys & Values
     * @method divide
     * @static
     * @param array $array
     * @return array
     */
    public static function divide(array $array): array;

    /**
     * Get Random Element of an array
     * @method random
     * @static
     * @param array $array
     * @return mixed  
     */
    public static function random(array $array): mixed;

    /**
     * Randomize Elements of an array
     * @method shuffle
     * @static
     * @param array $array
     * @return array
     */
    public static function shuffle(array $array): array;

    /**
     * Sort an Array by ASC
     * @method sort
     * @static
     * @param array $array
     * @return array
     */
    public static function sort(array $array): array;

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