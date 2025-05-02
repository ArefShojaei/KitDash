<?php

namespace Kit\Providers\Array;


trait HasSort {
    /**
     * Sort an array by ASC
     * @see https://laravel.com/docs/11.x/helpers#method-array-sort
     */
    public static function sort(array $array): array {
        sort($array, SORT_ASC);

        return $array;
    }
}