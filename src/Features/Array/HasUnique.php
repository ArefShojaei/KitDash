<?php

/**
 * @namespace
 */
namespace Kit\Features\Array;



/**
 * Has Unique
 * @trait
 */
trait HasUnique {
    /**
     * Get unique Array
     * @see https://lodash.info/doc/uniq
     * @method unique
     * @static
     * @param array $array
     * @return array
     */
    public static function unique(array $array): array {
        return array_unique($array);
    }
}