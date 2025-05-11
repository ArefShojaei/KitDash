<?php

namespace Kit\Utils;

use Kit\Contracts\Interfaces\Str as IStr;
use Kit\Utils\Providers\String\{
    HasValidation,
    HasDecoration,
    HasCase,
    HasCountable,
    HasEncodeable,
    HasEscapeable,
    HasExtraction,
    HasModifiable,
    HasSearchable
};


final class Str implements IStr {
    use HasValidation, HasDecoration, HasCase,
        HasEscapeable, HasSearchable, HasEncodeable,
        HasModifiable, HasCountable, HasExtraction;

    private function __construct() {}
}