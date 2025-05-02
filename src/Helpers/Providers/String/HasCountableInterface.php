<?php

namespace Kit\Helpers\Providers\String;


interface HasCountableInterface {
    public static function length(string $subject): int;
    public static function wordCount(string $subject): string;
}