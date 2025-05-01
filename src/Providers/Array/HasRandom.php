<?php

namespace Kit\Providers\Array;


trait HasRandom {
    /**
     * Get Random Element of an array
     * @see https://laravel.com/docs/11.x/helpers#method-array-random
     */
    public static function random(array $array): mixed {
        $randomKey = array_rand($array);

        return $array[$randomKey];
    }

    /**
     * Randomize Elements of an array
     * @see https://laravel.com/docs/11.x/helpers#method-array-shuffle
     */
    public static function shuffle(array $array): array {
        shuffle($array);

        return $array;
    }
}