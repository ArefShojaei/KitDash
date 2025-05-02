<?php

namespace Kit\Collections\Providers\String;


interface HasEscapeableInterface {
    public static function e(string $subject): string;
}
