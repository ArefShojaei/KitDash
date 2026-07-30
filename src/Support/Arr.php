<?php

namespace Kit\Support;

use Kit\Support\Interfaces\Arr as IArr;
use Kit\Support\Traits\Array\{
    Comparable,
    Concatenable,
    Mutable,
    Randomizable,
    Separable,
    Sortable,
    Uniqueable,
    Validatable,
};

final class Arr implements IArr
{
    use Comparable,
        Concatenable,
        Mutable,
        Randomizable,
        Separable,
        Sortable,
        Uniqueable,
        Validatable;

    private function __construct() {}
}
