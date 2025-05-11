<?php

namespace Kit\Contracts\Interfaces;


interface HasDecoration {
    public static function squish(string $subject): string;
    public static function trim($subject, $chars = " "): string;
}