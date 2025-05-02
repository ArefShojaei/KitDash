<?php

namespace Kit\Providers\Array;


trait HasCompareable {
    /**
     * Get not included elements of an array in another array
     * @see https://lodash.info/doc/difference
     */
    public static function difference(array $array, array $with): array {
        return array_diff($array, $with);
    }
}