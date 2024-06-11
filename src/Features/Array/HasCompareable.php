<?php

/**
 * @namespace
 */
namespace Kit\Features\Array;



/**
 * Has Compareable
 * @trait
 */
trait HasCompareable {
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
}