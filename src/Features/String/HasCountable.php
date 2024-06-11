<?php

/**
 * @namespace
 */
namespace Kit\Features\String;



/**
 * Has Countable
 * @trait
 */
trait HasCountable {
    /**
     * Get string length
     * @see https://laravel.com/docs/11.x/strings#method-str-length
     * @method length
     * @static
     * @param string $subject
     * @return int
     */
    public static function length(string $subject): int {
        return strlen($subject);
    }

    /**
     * Get Word count of a string
     * @see https://laravel.com/docs/11.x/strings#method-str-word-count
     * @method wordCount
     * @static
     * @param string $subject
     * @return string
     */
    public static function wordCount(string $subject): string {
        return str_word_count($subject);
    }
}