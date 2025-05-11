<?php

namespace Kit\Contracts\Interfaces;


interface HasRandom {
    public static function random(array $array): mixed;
    public static function shuffle(array $array): array;
}
