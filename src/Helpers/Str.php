<?php

namespace Kit\Helpers;

use Kit\Helpers\StrInterface;
use Kit\Helpers\Providers\String\{
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


class Str implements StrInterface {
    use HasValidation, HasDecoration, HasCase,
        HasEscapeable, HasSearchable, HasEncodeable,
        HasModifiable, HasCountable, HasExtraction;

    private function __construct() {}
}