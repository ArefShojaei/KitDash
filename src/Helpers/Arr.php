<?php

namespace Kit\Collections;

use Kit\Collections\ArrInterface;
use Kit\Collections\Providers\Array\{
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