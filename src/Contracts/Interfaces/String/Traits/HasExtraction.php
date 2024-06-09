<?php

/**
 * @namespace
 */
namespace Kit\Contracts\Interfaces\String\Traits;



/**
 * Has Extraction interface
 * @interface
 */
interface HasExtraction {
    /**
     * Split content of a string by Separator
     * @method split
     * @static
     * @param string $subject
     * @param string $separator
     * @return array
     */
    public static function split(string $subject, string $separator): array;
}