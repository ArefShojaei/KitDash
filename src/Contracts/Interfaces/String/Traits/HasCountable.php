<?php

/**
 * @namespace
 */
namespace Kit\Contracts\Interfaces\String\Traits;



/**
 * Has Countable interface
 * @interface
 */
interface HasCountable {
    /**
     * Get string length
     * @method length
     * @static
     * @param string $subject
     * @return int
     */
    public static function length(string $subject): int;

    /**
     * Get Word count of a string
     * @method wordCount
     * @static
     * @param string $subject
     * @return string
     */
    public static function wordCount(string $subject): string;
}