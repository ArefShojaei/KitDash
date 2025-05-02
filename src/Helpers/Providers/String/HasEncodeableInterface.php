<?php

namespace Kit\Helpers\Providers\String;


interface HasEncodeableInterface {
    public static function toBase64(string $subject): string;
}