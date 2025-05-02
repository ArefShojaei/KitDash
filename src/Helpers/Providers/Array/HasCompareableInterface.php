<?php

namespace Kit\Collections\Providers\Array;


interface HasCompareableInterface {
    public static function difference(array $array, array $with): array;
}
