<?php

namespace Kit\Helpers\Providers\Array;


interface HasCompareableInterface {
    public static function difference(array $array, array $with): array;
}
