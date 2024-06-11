<?php

/**
 * @namespace
 */
namespace Kit\Contracts\Interfaces\Array\Traits;



/**
 * Has Random interface
 * @interface
 */
interface HasRandom {
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
}