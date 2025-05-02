<?php

namespace Kit\Providers\Array;


interface HasRandomInterface {
    public static function random(array $array): mixed;
    public static function shuffle(array $array): array;
}
