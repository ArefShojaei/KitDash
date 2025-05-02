<?php

namespace Kit\Collections\Providers\String;


interface HasCountableInterface {
    public static function length(string $subject): int;
    public static function wordCount(string $subject): string;
}