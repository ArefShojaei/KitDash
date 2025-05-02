<?php

namespace Kit\Providers\String;


interface HasExtractionInterface {
    public static function split(string $subject, string $separator): array;
}
