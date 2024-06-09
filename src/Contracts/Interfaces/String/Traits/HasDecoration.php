<?php

/**
 * @namespace
 */
namespace Kit\Contracts\Interfaces\String\Traits;



/**
 * Has Decoration interface
 * @interface
 */
interface HasDecoration {
    /**
     * Remove all white spaces
     * @method squish
     * @static
     * @param string $subject
     * @return string
     */
    public static function squish(string $subject): string;

    /**
     * Remove both sides of white spaces
     * @method trim
     * @static
     * @param string $subject
     * @param string $chars
     * @return string
     */
    public static function trim($subject, $chars = " "): string;
}