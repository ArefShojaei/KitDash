<?php

/**
 * @namespace
 */
namespace Kit\Contracts\Interfaces\Array\Traits;



/**
 * Has Compareable interface
 * @interface
 */
interface HasCompareable {
    /**
     * Get not included Elements of an array in another Array
     * @method difference
     * @static
     * @param array $array
     * @param array $with
     * @return array
     */
    public static function difference(array $array, array $with): array;
}