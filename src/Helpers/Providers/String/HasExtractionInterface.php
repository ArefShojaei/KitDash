<?php

namespace Kit\Helpers\Providers\String;


interface HasExtractionInterface {
    public static function split(string $subject, string $separator): array;
}
