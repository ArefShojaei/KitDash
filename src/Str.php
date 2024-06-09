<?php

/**
 * @namespace
 */
namespace Kit;


/**
 * @package
 */
use Kit\Contracts\Interfaces\String\Str as StrContract;



/**
 * String Util
 * @class
 * @implements StrContract
 */
class Str implements StrContract {
    /**
     * Constructor
     * @private
     */
    private function __construct() {}


    /**
     * Convert special characters
     * @param string $subject
     * @return string
     */
    public static function e(string $subject): string
    {
        return htmlspecialchars($subject);
    }
}