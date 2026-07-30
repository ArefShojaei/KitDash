<?php

namespace Kit\Support;

use Kit\Support\Interfaces\Str as IStr;
use Kit\Support\Traits\String\{
    Caseable,
    Countable,
    Decoratable,
    Encodable,
    Escapable,
    Extraction,
    Modifiable,
    Searchable,
    Validatable,
};

final class Str implements IStr
{
    use Caseable,
        Countable,
        Decoratable,
        Encodable,
        Escapable,
        Extraction,
        Modifiable,
        Searchable,
        Validatable;

    private function __construct() {}
}
