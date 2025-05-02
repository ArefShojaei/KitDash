<?php

namespace Kit\Helpers\Providers\String;


interface HasEscapeableInterface {
    public static function e(string $subject): string;
}
