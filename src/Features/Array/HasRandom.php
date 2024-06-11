<?php

/**
 * @namespace
 */
namespace Kit\Features\Array;



/**
 * Has Random
 * @trait
 */
trait HasRandom {
    /**
     * Get Random Element of an array
     * @method random
     * @static
     * @param array $array
     * @return mixed  
     */
    public static function random(array $array): mixed {
        $randomKey = array_rand($array);

        return $array[$randomKey];
    }

    /**
     * Randomize Elements of an array
     * @method shuffle
     * @static
     * @param array $array
     * @return array
     */
    public static function shuffle(array $array): array {
        shuffle($array);
        
        return $array;
    }
}