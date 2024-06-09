<?php

/**
 * @namespace
 */
namespace Kit;


/**
 * @package
 */
use Kit\Contracts\Interfaces\String\Str as Contract;
use Kit\Features\String\{
    HasValidation,
    HasDecoration,
    HasCase,
    HasCountable,
    HasEncodeable,
    HasEscapeable,
    HasExtraction,
    HasModifiable,
    HasSearch
};



/**
 * String Util
 * @class
 * @implements StrContract
 */
class Str implements Contract {
    /**
     * Import Traits
     */
    use HasValidation, HasDecoration, HasCase,
        HasEscapeable, HasSearch, HasEncodeable,
        HasModifiable, HasCountable, HasExtraction;



    /**
     * Constructor
     * @private
     */
    private function __construct() {}
}