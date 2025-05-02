<?php

namespace Kit\Collections\Providers\String;


interface HasDecorationInterface {
    public static function squish(string $subject): string;
    public static function trim($subject, $chars = " "): string;
}