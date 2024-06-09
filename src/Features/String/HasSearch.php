<?php

/**
 * @namespace
 */
namespace Kit\Features\String;



/**
 * Has Search 
 * @trait
 */
trait HasSearch {
    /**
     * Get word of string by Index
     * @method charAt
     * @static
     * @param string $subject
     * @param int $index
     * @return string
     */
    public static function charAt(string $subject, int $index): string {
        return $subject[$index] ?? 0;
    }

    /**
     * Get position of a Word in a string
     * @method position
     * @static
     * @param string $subject
     * @param string $search
     * @return string
     */
    public static function position(string $subject, string $search): string {
        return strpos($subject, $search);
    }
}