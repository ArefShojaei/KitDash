<?php

/**
 * @namespace
 */
namespace Kit\Contracts\Interfaces\String;



/**
 * String interface
 * @interface
 */
interface Str {
    /**
     * Convert special characters
     * @param string $subject
     * @return string
     */
    public static function e(string $subject): string;

    /**
     * Get string after a Word or Sentence
     * @method after
     * @static
     * @param string $subject
     * @param string $search
     * @return string
     */
    public static function after(string $subject, string $search): string;

    /**
     * Get string before a Word or Sentence
     * @method before
     * @static
     * @param string $subject
     * @param string $search
     * @return string
     */
    public static function before(string $subject, string $search): string;
}