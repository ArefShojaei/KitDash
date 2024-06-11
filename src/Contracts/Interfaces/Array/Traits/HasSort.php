<?php

/**
 * @namespace
 */
namespace Kit\Contracts\Interfaces\Array\Traits;



/**
 * Has Sort interface
 * @interface
 */
interface HasSort {
    /**
     * Sort an Array by ASC
     * @method sort
     * @static
     * @param array $array
     * @return array
     */
    public static function sort(array $array): array;
}