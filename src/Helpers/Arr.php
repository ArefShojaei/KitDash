<?php

namespace Kit\Helpers;

use Kit\Helpers\ArrInterface;
use Kit\Helpers\Providers\Array\{
    HasCompareable,
    HasConcatenation,
    HasCRUD,
    HasRandom,
    HasSeparator,
    HasSort,
    HasUnique,
    HasValidation
};


final class Arr implements ArrInterface {
    use HasValidation, HasConcatenation, HasCRUD,
        HasRandom, HasSort, HasSeparator,
        HasCompareable, HasUnique;

    private function __construct() {}
}