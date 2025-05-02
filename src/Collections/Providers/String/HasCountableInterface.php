<?php

namespace Kit\Providers\String;


interface HasCountableInterface {
    public static function length(string $subject): int;
    public static function wordCount(string $subject): string;
}