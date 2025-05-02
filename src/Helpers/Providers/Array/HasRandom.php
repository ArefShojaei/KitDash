<?php

namespace Kit\Collections\Providers\Array;


trait HasRandom {
    /**
     * @see https://laravel.com/docs/11.x/helpers#method-array-random
     */
    public static function random(array $array): mixed {
        $randomKey = array_rand($array);

        return $array[$randomKey];
    }

    /**
     * Randomize elements of an array
     * @see https://laravel.com/docs/11.x/helpers#method-array-shuffle
     */
    public static function shuffle(array $array): array {
        shuffle($array);

        return $array;
    }
}