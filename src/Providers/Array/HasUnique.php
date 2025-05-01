<?php

namespace Kit\Providers\Array;


trait HasUnique {
    /**
     * Get unique Array
     * @see https://lodash.info/doc/uniq
     */
    public static function unique(array $array): array {
        return array_unique($array);
    }
}