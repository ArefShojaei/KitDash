<?php

namespace Kit\Providers\Array;


trait HasSeparator {
    /**
     * Divide an Array to two arrays that provides Keys & Values
     * @see https://laravel.com/docs/11.x/helpers#method-array-divide
     */
    public static function divide(array $array): array {
        $keys = array_keys($array);;
        $values = array_values($array);

        return [$keys, $values];
    }

    /**
     * Split an Array by Size
     * @see https://lodash.info/doc/chunk
     */
    public static function chunk(array $array, int $size): array {
        return array_chunk($array, $size);
    }
}