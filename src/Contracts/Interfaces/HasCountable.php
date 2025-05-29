<?php

namespace Kit\Contracts\Interfaces;


interface HasCountable {
    public static function length(string $subject): int;
    public static function wordCount(string $subject): int;
}