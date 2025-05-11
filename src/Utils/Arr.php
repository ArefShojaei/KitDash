<?php

namespace Kit\Utils;

use Kit\Contracts\Interfaces\Arr as IArr;
use Kit\Utils\Providers\Array\{
    HasCompareable,
    HasConcatenation,
    HasCRUD,
    HasRandom,
    HasSeparator,
    HasSort,
    HasUnique,
    HasValidation
};


final class Arr implements IArr {
    use HasValidation, HasConcatenation, HasCRUD,
        HasRandom, HasSort, HasSeparator,
        HasCompareable, HasUnique;

    private function __construct() {}
}