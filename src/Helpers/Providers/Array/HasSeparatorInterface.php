<?php

namespace Kit\Helpers\Providers\Array;


interface HasSeparatorInterface {
    public static function divide(array $array): array;
    public static function chunk(array $array, int $size): array;
}
