<?php

namespace Kit\Collections\Providers\String;


interface HasEncodeableInterface {
    public static function toBase64(string $subject): string;
}