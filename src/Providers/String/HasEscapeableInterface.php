<?php

namespace Kit\Providers\String;


interface HasEscapeableInterface {
    public static function e(string $subject): string;
}
