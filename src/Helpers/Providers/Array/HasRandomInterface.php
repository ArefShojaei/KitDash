<?php

namespace Kit\Helpers\Providers\Array;


interface HasRandomInterface {
    public static function random(array $array): mixed;
    public static function shuffle(array $array): array;
}
