<?php

namespace Kit;

use Kit\Providers\ArrInterface;
use Kit\Providers\Array\{
    HasCompareable,
    HasConcatenation,
    HasCRUD,
    HasRandom,
    HasSeparator,
    HasSort,
    HasUnique,
    HasValidation
};


class Arr implements ArrInterface {
    use HasValidation, HasConcatenation, HasCRUD,
        HasRandom, HasSort, HasSeparator,
        HasCompareable, HasUnique;

    private function __construct() {}
}