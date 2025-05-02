<?php

namespace Kit\Helpers;

use Kit\Helpers\Providers\String\{
    HasCountableInterface,
    HasValidationInterface,
    HasDecorationInterface,
    HasEncodeableInterface,
    HasEscapeableInterface,
    HasExtractionInterface,
    HasModifiableInterface,
    HasSearchableInterface
};


interface StrInterface extends HasValidationInterface,
    HasDecorationInterface,
    HasEscapeableInterface,
    HasSearchableInterface,
    HasEncodeableInterface,
    HasModifiableInterface,
    HasCountableInterface,
    HasExtractionInterface {}
