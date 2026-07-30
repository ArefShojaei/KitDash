<?php

namespace Kit\Support\Interfaces\Array;

interface Randomizable
{
    public static function random(array $array): mixed;

    public static function shuffle(array $array): array;
}
