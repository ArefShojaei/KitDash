<?php

/**
 * @namespace
 */
namespace Kit\Features\Array;



/**
 * Has Sort
 * @trait
 */
trait HasSort {
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
}