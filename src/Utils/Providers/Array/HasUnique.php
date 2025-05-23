<?php

namespace Kit\Utils\Providers\Array;


trait HasUnique {
    /**
     * @see https://lodash.info/doc/uniq
     */
    public static function unique(array $array): array {
        return array_unique($array);
    }
}