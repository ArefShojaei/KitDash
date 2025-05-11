<?php

namespace Kit\Contracts\Interfaces;


interface HasCompareable {
    public static function difference(array $array, array $with): array;
}
