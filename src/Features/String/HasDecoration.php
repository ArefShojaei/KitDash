<?php

/**
 * @namespace
 */
namespace Kit\Features\String;



/**
 * Has Validation
 * @trait
 */
trait HasDecoration {
    /**
     * Remove all white spaces
     * @see https://laravel.com/docs/11.x/strings#method-str-squish
     * @method squish
     * @static
     * @param string $subject
     * @return string
     */
    public static function squish(string $subject): string {
        $content = preg_replace_callback("/(?<space> ){2,}/", function ($matches) {
            return " ";
        }, $subject);

        return trim($content);
    }

    /**
     * Remove both sides of white spaces
     * @see https://laravel.com/docs/11.x/strings#method-str-trim
     * @method trim
     * @static
     * @param string $subject
     * @param string $chars
     * @return string
     */
    public static function trim($subject, $chars = " "): string {
        return trim($subject, $chars);
    }
}