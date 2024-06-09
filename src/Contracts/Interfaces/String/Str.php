<?php

/**
 * @namespace
 */
namespace Kit\Contracts\Interfaces\String;


/**
 * @package
 */
use Kit\Contracts\Interfaces\String\Traits\{
    HasCountable,
    HasValidation,
    HasDecoration,
    HasEncodeable,
    HasEscapeable,
    HasExtraction,
    HasModifiable,
    HasSearch
};


/**
 * String interface
 * @interface
 */
interface Str extends HasValidation, HasDecoration,HasEscapeable, 
                    HasSearch, HasEncodeable, HasModifiable, 
                    HasCountable, HasExtraction {}