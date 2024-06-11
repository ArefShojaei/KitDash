<?php

/**
 * @namespace
 */
namespace Kit\Contracts\Interfaces\Array;


/**
 * @package
 */
use Kit\Contracts\Interfaces\Array\Traits\{
    HasCompareable,
    HasConcatenation,
    HasCRUD,
    HasRandom,
    HasSeparator,
    HasSort,
    HasUnique,
    HasValidation
};




/**
 * Array interface
 * @interface
 */
interface Arr extends HasValidation, HasConcatenation, HasCRUD, 
                    HasRandom, HasSort, HasSeparator, 
                    HasCompareable, HasUnique {}