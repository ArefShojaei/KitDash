<?php

namespace Kit\Providers\String;


interface HasEncodeableInterface {
    public static function toBase64(string $subject): string;
}