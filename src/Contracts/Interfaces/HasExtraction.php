<?php

namespace Kit\Contracts\Interfaces;


interface HasExtraction {
    public static function split(string $subject, string $separator): array;
}
