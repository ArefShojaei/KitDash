<?php

namespace Kit\Support\Traits\Array;

trait Uniqueable
{
    /**
     * @see https://lodash.info/doc/uniq
     */
    public static function unique(array $array): array
    {
        return array_unique($array);
    }
}
